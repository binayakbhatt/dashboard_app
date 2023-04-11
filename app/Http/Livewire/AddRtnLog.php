<?php

namespace App\Http\Livewire;

use App\Models\Rtn;
use App\Models\RtnLog;
use Livewire\Component;

class AddRtnLog extends Component
{
    public $rtns;
    public $offices = null;
    public $userOffices;

    public $rtn_id;
    public $recording_office_id;
    public $arrived_at;
    public $departed_at;
    public $remarks;

    public $office_ids = [];
    public $bags_dispatched = [];
    public $bags_left = [];

    public function mount()
    {
        $this->rtns = Rtn::all();
        $this->userOffices = auth()->user()->offices;
    }

    public function updatedRtnId($value)
    {
        if ($value) {
            $this->offices = Rtn::find($value)->offices;
            // Set $office_ids, $bags_dispatched, $bags_left as $id => 0
            $this->office_ids = $this->offices->pluck('id')->toArray();
            $this->bags_dispatched = array_fill_keys($this->office_ids, 0);
            $this->bags_left = array_fill_keys($this->office_ids, 0);
        }else{
            $this->offices = null;
            // Set $office_ids, $bags_dispatched, $bags_left as empty array
            $this->office_ids = [];
            $this->bags_dispatched = [];
            $this->bags_left = [];
        }
    }

    public function rules()
    {
        return [
            'rtn_id' => 'required|exists:rtns,id',
            'recording_office_id' => 'required|exists:offices,id',
            'arrived_at' => 'required|date',
            'departed_at' => 'required|date',
            'remarks' => 'nullable|string',
            'office_ids' => 'required|array',
            'office_ids.*' => 'required|exists:offices,id',
            'bags_dispatched' => 'required|array',
            'bags_dispatched.*' => 'required|integer|min:0',
            'bags_left' => 'required|array',
            'bags_left.*' => 'required|integer|min:0',
        ];
    }

    public function submit()
    {
        $this->validate();

        $rtnLog = RtnLog::create([
            'rtn_id' => $this->rtn_id,
            'created_by' => auth()->id(),
            'recording_office_id' => $this->recording_office_id,
            'arrived_at' => $this->arrived_at,
            'departed_at' => $this->departed_at,
            'remarks' => $this->remarks,
        ]);

        foreach ($this->office_ids as $key => $office_id) {
            $rtnLog->bags()->create([
                'office_id' => $office_id,
                'bags_dispatched' => $this->bags_dispatched[$office_id],
                'bags_left' => $this->bags_left[$office_id],
            ]);
        }

        return redirect()->route('rtn-logs.index');
    }

    public function render()
    {
        return view('livewire.add-rtn-log');
    }
}

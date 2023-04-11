<?php

namespace App\Http\Livewire;

use App\Models\Rtn;
use App\Models\Office;
use App\Models\RtnLog;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class RtnLogTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\RtnLog>
     */
    public function datasource(): Builder
    {
        return RtnLog::query()
            ->join('rtns', 'rtns.id', '=', 'rtn_logs.rtn_id')
            ->join('offices', 'offices.id', '=', 'rtn_logs.recording_office_id')
            ->join('users', 'users.id', '=', 'rtn_logs.created_by')
            ->select('rtn_logs.*', 'rtns.name as rtn_name', 'offices.name as recording_office_name', 'users.name as created_by_name')
            ->with('bags');
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('rtn_id')
            ->addColumn('created_by')
            ->addColumn('created_by_name')
            ->addColumn('recording_office_id')
            ->addColumn('arrived_at_formatted', fn (RtnLog $model) => Carbon::parse($model->arrived_at)->format('d/m/Y H:i:s'))
            ->addColumn('departed_at_formatted', fn (RtnLog $model) => Carbon::parse($model->departed_at)->format('d/m/Y H:i:s'))
            ->addColumn('remarks')
            ->addColumn('created_at_formatted', fn (RtnLog $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (RtnLog $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'))
            ->addColumn('rtn_name')
            ->addColumn('reporting_office_name')
            ->addColumn('bags_dispatched', fn (RtnLog $model) => $model->bags->sum('bags_dispatched'))
            ->addColumn('bags_left', fn (RtnLog $model) => $model->bags->sum('bags_left'))
            ->addColumn('bags_dispatched_detail', fn (RtnLog $model) => $model->bags->map(fn ($bag) => $bag->office->name . ': ' . $bag->bags_dispatched)->implode(', '))
            ->addColumn('bags_left_detail', fn (RtnLog $model) => $model->bags->map(fn ($bag) => $bag->office->name . ': ' . $bag->bags_left)->implode(', '));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('RTN', 'rtn_name')
                ->sortable()
                ->searchable()
                ->makeInputSelect(Rtn::all(), 'name', 'rtn_id'),

            Column::make('CREATED BY', 'created_by_name')
                ->sortable()
                ->searchable(),

            Column::make('RECORDING OFFICE', 'recording_office_name')
                ->makeInputSelect(Office::all(), 'name', 'recording_office_id'),

            Column::make('ARRIVED AT', 'arrived_at_formatted', 'arrived_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('DEPARTED AT', 'departed_at_formatted', 'departed_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('BAGS DISPATCHED', 'bags_dispatched'),

            Column::make('BAGS LEFT', 'bags_left'),

            Column::make('REMARKS', 'remarks')
                ->sortable()
                ->searchable()
                ->hidden()
                ->visibleInExport(true),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('BAGS DISPATCHED DETAIL', 'bags_dispatched_detail')
                ->hidden()
                ->visibleInExport(true),

            Column::make('BAGS LEFT DETAIL', 'bags_left_detail')
                ->hidden()
                ->visibleInExport(true),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid RtnLog Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                ->class('bg-indigo-500 cursor-pointer text-white px-3 py-1 m-1 rounded text-sm')
                ->route('rtn-logs.edit', ['rtn_log' => 'id'])
                ->target(''),

            /*
               Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('rtn-log.destroy', ['rtn-log' => 'id'])
               ->method('delete')
               */
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid RtnLog Action Rules.
     *
     * @return array<int, RuleActions>
     */

    
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn (RtnLog $rtnlog) => $rtnlog->created_by !== auth()->id())
                ->hide(),
        ];
    }
}

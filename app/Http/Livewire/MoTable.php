<?php

namespace App\Http\Livewire;

use App\Models\Mo;
use App\Models\Office;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class MoTable extends PowerGridComponent
{
    use ActionButton;

    public int $queues = 5; // Use two queues

    // public string $onQueue = 'my-dishes'; //queue name

    // public string $onConnection = 'redis'; // default sync

    public bool $showExporting = true; //Show progress on screen
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
     * @return Builder<\App\Models\Mo>
     */
    public function datasource(): Builder
    {
        $query =  Mo::query()
            ->join('offices', 'offices.id', '=', 'mos.office_id')
            ->join('sets', 'sets.id', '=', 'mos.set_id')
            ->select('mos.*', 'offices.name as office_name', 'sets.name as set_name')
            ->orderBy('mos.date', 'desc');

        // Check if user has any of the roles: 'Administrator', 'Verified'
        if (!auth()->user()->hasRole(['Administrator', 'Verified'])) {
            $assigned_offices = auth()->user()->offices->pluck('id')->toArray();
            $query = $query->whereIn('mos.office_id', $assigned_offices);
        }

        return $query;
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
        return [
            'office' => ['name'],
            'set' => ['name'],
        ];
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
            ->addColumn('office_name')
            ->addColumn('date')
            ->addColumn('date_formatted', function (Mo $model) {
                return $model->date->format('d/m/y');
            })
            ->addColumn('set_name')

            ->addColumn('bags_opening_balance')
            ->addColumn('bags_received')
            ->addColumn('bags_opened')
            ->addColumn('bags_closed')
            ->addColumn('bags_dispatched')
            ->addColumn('bags_transferred')
            ->addColumn('bags', function (Mo $model) {
                return $model->bags_opening_balance . '/' . $model->bags_received . '/' . $model->bags_opened . '/' . $model->bags_closed . '/' . $model->bags_dispatched . '/' . $model->bags_transferred;
            })

            ->addColumn('articles_received')
            ->addColumn('articles_closed')
            ->addColumn('articles_pending')

            ->addColumn('customs_examination')
            ->addColumn('customs_clearance')
            ->addColumn('customs_pending')

            ->addColumn('sa_WS')
            ->addColumn('mts_WS')
            ->addColumn('dwl_WS')
            ->addColumn('gds_WS')

            ->addColumn('manpower')
            ->addColumn('manpower_formatted', function (Mo $model) {
                return $model->manpower ? 'Yes' : 'No';
            })
            ->addColumn('logbook')
            ->addColumn('logbook_formatted', function (Mo $model) {
                return $model->logbook ? 'Yes' : 'No';
            })
            ->addColumn('rtn')
            ->addColumn('rtn_formatted', function (Mo $model) {
                return $model->rtn ? 'Yes' : 'No';
            })

            ->addColumn('remarks')

            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (Mo $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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
            Column::make('Office', 'office_name')
                ->makeInputSelect(Office::query()->orderBy('name')->get(), 'name', 'office_id'),

            Column::make('Date', 'date_formatted', 'date')
                ->makeInputDatePicker()
                ->searchable(),

            Column::make('Set', 'set_name'),

            Column::make('Bags Op_Bal', 'bags_opening_balance'),
            Column::make('Bags Rec', 'bags_received'),
            Column::make('Bags Op', 'bags_opened'),
            Column::make('Bags Cl', 'bags_closed'),
            Column::make('Bags Disp', 'bags_dispatched'),
            // Column::make('Bags Rec/Op/Cl/Disp', 'bags')
            // ->sortable(),
            Column::make('Bags Tnf', 'bags_transferred'),

            Column::make('Art Rec', 'articles_received'),
            Column::make('Art Cl', 'articles_closed'),
            Column::make('Art Pd', 'articles_pending'),

            Column::make('Cust Exam', 'customs_examination'),
            Column::make('Cust Clear', 'customs_clearance'),
            Column::make('Cust Pd', 'customs_pending'),

            Column::make('SA', 'sa_WS'),
            Column::make('MTS', 'mts_WS'),
            Column::make('DWL', 'dwl_WS'),
            Column::make('GDS', 'gds_WS'),

            // Column::make('Manpower', 'manpower_formatted'),
            // Column::make('Logbook', 'logbook_formatted'),
            // Column::make('RTN', 'rtn_formatted'),

            Column::make('Remarks', 'remarks'),


            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->makeInputDatePicker()
                ->searchable()
                ->hidden(),
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
     * PowerGrid Mo Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                ->class('text-indigo-600 hover:text-indigo-900 hover:underline')
                ->route('mos.edit', ['mo' => 'id'])
                ->target(''),

            /*
           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('mo.destroy', ['mo' => 'id'])
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
     * PowerGrid Mo Action Rules.
     *
     * @return array<int, RuleActions>
     */


    public function actionRules(): array
    {
        return [
            //Check if user is owner of the Mo
            Rule::button('edit')
                ->when(fn (Mo $mo) => $mo->user_id !== auth()->id())
                ->hide(),
        ];
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Aadhaar;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AadhaarTable extends PowerGridComponent
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
    * @return Builder<\App\Models\Aadhaar>
    */
    public function datasource(): Builder
    {
        return Aadhaar::query()
        ->join('imports', 'imports.id', '=', 'aadhaars.import_id')
        ->join('divisions', 'divisions.id', '=', 'aadhaars.division_id')
        ->join('pincodes', 'pincodes.id', '=', 'aadhaars.pincode_id')
        ->select('aadhaars.*', 'imports.file_name', 'divisions.name as division_name', 'pincodes.pincode as pincode');
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
            ->addColumn('import_id')
            ->addColumn('division_id')
            ->addColumn('division_name')
            ->addColumn('station_no')
            ->addColumn('centre_name')
            ->addColumn('pincode')
            ->addColumn('operator_name')
            ->addColumn('transaction_date')
            ->addColumn('transaction_date_formatted', fn (Aadhaar $model) => Carbon::parse($model->transaction_date)->format('d/m/Y'))
            ->addColumn('centre_type')
            ->addColumn('enrolments')
            ->addColumn('updates')
            ->addColumn('created_at_formatted', fn (Aadhaar $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Aadhaar $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('DIVISION', 'division_name')
                ->makeInputSelect(\App\Models\Division::all(), 'name', 'aadhaars.division_id'),

            Column::make('STATION NO', 'station_no')
                ->sortable(),

            Column::make('CENTRE NAME', 'centre_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('OPERATOR NAME', 'operator_name')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('TRANSACTION DATE', 'transaction_date_formatted', 'transaction_date')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('CENTRE TYPE', 'centre_type')
                ->sortable(),

            Column::make('ENROLMENTS', 'enrolments')
                ->sortable(),
            Column::make('UPDATES', 'updates')
                ->sortable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->hidden()
                ->visibleInExport(True),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Aadhaar Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('aadhaar.edit', ['aadhaar' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('aadhaar.destroy', ['aadhaar' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Aadhaar Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($aadhaar) => $aadhaar->id === 1)
                ->hide(),
        ];
    }
    */
}

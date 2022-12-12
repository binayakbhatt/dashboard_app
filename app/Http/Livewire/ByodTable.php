<?php

namespace App\Http\Livewire;

use App\Models\Byod;
use App\Models\Division;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ByodTable extends PowerGridComponent
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
    * @return Builder<\App\Models\Byod>
    */
    public function datasource(): Builder
    {
        return Byod::query()
            ->join('divisions', 'divisions.id', '=', 'byods.division_id')
            ->join('users', 'users.id', '=', 'byods.created_by')
            ->select('byods.*', 'divisions.name as division_name', 'users.name as created_by_name');
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
            ->addColumn('name')
            ->addColumn('mobile')
            ->addColumn('email')
            ->addColumn('make_model')
            ->addColumn('imei')
            ->addColumn('post_office')
            ->addColumn('date_of_purchase_formatted', fn (Byod $model) => Carbon::parse($model->date_of_purchase)->format('d/m/Y'))
            ->addColumn('date_of_acceptance_formatted', fn (Byod $model) => Carbon::parse($model->date_of_acceptance)->format('d/m/Y'))
            ->addColumn('division_id')
            ->addColumn('division_name')
            ->addColumn('employee_id')
            ->addColumn('created_by')
            ->addColumn('created_by_name')
            ->addColumn('created_at_formatted', fn (Byod $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Byod $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
            Column::make('NAME', 'name')
                ->sortable()
                ->searchable(),

            Column::make('MOBILE', 'mobile')
                ->sortable()
                ->searchable(),

            Column::make('EMAIL', 'email')
                ->sortable()
                ->searchable(),

            Column::make('MAKE MODEL', 'make_model')
                ->sortable()
                ->searchable(),

            Column::make('IMEI', 'imei')
                ->sortable()
                ->searchable(),

            Column::make('POST OFFICE', 'post_office')
                ->sortable()
                ->searchable(),

            Column::make('DATE OF PURCHASE', 'date_of_purchase_formatted', 'date_of_purchase')
                ->searchable()
                ->sortable(),

            Column::make('DATE OF ACCEPTANCE', 'date_of_acceptance_formatted', 'date_of_acceptance')
                ->searchable()
                ->sortable(),

            Column::make('DIVISION ID', 'division_name', 'division_id')
                ->makeInputSelect(
                    Division::all(), 'name', 'division_id'
                ),

            Column::make('EMPLOYEE ID', 'employee_id')
                ->sortable()
                ->searchable(),

            Column::make('CREATED BY', 'created_by_name', 'created_by')
                ->sortable(),

            Column::make('CREATED AT', 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),
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
     * PowerGrid Byod Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('byod.edit', ['byod' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('byod.destroy', ['byod' => 'id'])
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
     * PowerGrid Byod Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($byod) => $byod->id === 1)
                ->hide(),
        ];
    }
    */
}

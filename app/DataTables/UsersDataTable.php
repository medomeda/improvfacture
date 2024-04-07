<?php
namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;


class UsersDataTable extends DataTable
{

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }
 
    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }
 
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }
 
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }
 
    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }

    // /**
    //  * Build DataTable class.
    //  *
    //  * @param mixed $query Results from query() method.
    //  * @return \Yajra\DataTables\DataTableAbstract
    //  */
    // public function dataTable($query)
    // {
    //     $dataTable =  datatables()->eloquent($query);
    //     $columns = array_column($this->getColumns(), 'data');
    //     $dataTable = $dataTable
    //         /*->editColumn('updated_at', function ($cart) {
    //             return getDateColumn($cart, 'updated_at');
    //         })
    //         ->editColumn('options', function ($cart) {
    //             return getLinksColumn($cart->options, 'options', 'id', 'name');
    //         })
    //         ->addColumn('action', 'users.datatables_actions')*/
    //         ->rawColumns(array_merge($columns, ['action']));

    //     dd($dataTable);

    //     return $dataTable;
    // }
  
    // /**
    //  * Get query source of dataTable.
    //  *
    //  * @param \App\User $model
    //  * @return \Illuminate\Database\Eloquent\Builder
    //  */
    // public function query(User $model)
    // {
    //    dd($model->newQuery()->select('users.*'));
    //     return $model->newQuery()->select('users.*');
    // }
  
    // /**
    //  * Optional method if you want to use html builder.
    //  *
    //  * @return \Yajra\DataTables\Html\Builder
    //  */
    // public function html()
    // {
    //     return $this->builder()
    //                 ->setTableId('users-table')
    //                 ->columns($this->getColumns())
    //                 ->minifiedAjax()
    //                 ->orderBy(1)
    //                 ->parameters([
    //                     'dom'          => 'Bfrtip',
    //                     'buttons'      => ['excel', 'csv'],
    //                 ]);
    // }
  
    // /**
    //  * Get columns.
    //  *
    //  * @return array
    //  */
    // protected function getColumns()
    // {
    //     return [
    //         Column::make('id'),
    //         Column::make('name'),
    //         Column::make('email'),
    //         Column::make('created_at'),
    //     ];
    // }
  
    // /**
    //  * Get filename for export.
    //  *
    //  * @return string
    //  */
    // protected function filename()
    // {
    //     return 'usersdatatable_' . time();
    // }
}
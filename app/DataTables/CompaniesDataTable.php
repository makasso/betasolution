<?php

namespace App\DataTables;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CompaniesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->rawColumns(['company', 'status'])
            ->editColumn('company', function (Company $company) {
                return view('pages.apps.company-management.companies.columns._company', compact('company'));
            })
            ->editColumn('industry', function (Company $company) {
                return ucwords($company->industry);
            })
            ->editColumn('address', function (Company $company) {
                return ucwords($company->address);
            })
            ->editColumn('phone', function (Company $company) {
                return ucwords($company->phone);
            })
            ->editColumn('status', function (Company $company) {
                return $company->status === 'active' ?
                    sprintf('<div class="badge badge-success fw-bold">%s</div>', ucfirst($company->status))
                    : sprintf('<div class="badge badge-danger fw-bold">%s</div>', ucfirst($company->status));
            })
            ->editColumn('created_at', function (Company $company) {
                return $company->created_at->format('d M Y, h:i');
            })
            ->addColumn('action', function (Company $company) {
                return view('pages/apps.company-management.companies.columns._actions', compact('company'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Company $model): QueryBuilder
    {
        return $model->newQuery()->latest();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('companies-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('rt' . "<'row'<'col-sm-12'tr>><'d-flex justify-content-between'<'col-sm-12 col-md-5'i><'d-flex justify-content-between'p>>",)
                    ->addTableClass('table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer text-gray-600 fw-semibold')
                    ->setTableHeadClass('text-start text-muted fw-bold fs-7 text-uppercase gs-0')
                    ->orderBy(2)
            ->drawCallback("function() {" . file_get_contents(resource_path('views/pages/apps/company-management/companies/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('company')->addClass('d-flex align-items-center')->title(trans('admin/app.menu.company'))->name('name')->exportable(true)->printable(true),
            Column::make('industry')->searchable(true)->exportable(true)->printable(true)->title(trans('admin/app.general.company_table.industry')),
            Column::make('address')->searchable(true)->exportable(true)->printable(true)->title(trans('admin/app.general.company_table.address')),
            Column::make('phone')->title(trans('admin/app.general.company_table.phone'))->exportable(true)->printable(true),
            Column::make('status')->title(trans('admin/app.general.company_table.status'))->exportable(true)->printable(true),
            Column::make('created_at')->title(trans('admin/app.general.company_table.created_at'))->addClass('text-nowrap')->exportable(true)->printable(true),
            Column::computed('action')
                ->addClass('text-end text-nowrap')
                ->exportable(false)
                ->printable(false)
                ->width(60)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Companies_' . date('YmdHis');
    }
}

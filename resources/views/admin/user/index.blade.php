@extends('layouts.app')
  
@section('content')
<!-- Container-fluid starts-->
<div class="container-fluid">
  <div class="page-header">
    <div class="row">
      <div class="col-lg-6">
        <h3>User</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Master Data</li>
            <li class="breadcrumb-item active">User</li>
        </ol>
      </div>
      <div class="col-lg-6">
      </div>
    </div>
  </div>
</div>        
      <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Alternative pagination</h5>
                        <span>
                            The default page control presented by DataTables (forward and backward buttons with up to 7 page numbers in-between) is fine for most situations, but there are cases where you may wish to customise the options
                            presented to the end user. This is done through DataTables' extensible pagination mechanism, the pagingType option.
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-10">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
            <!-- Container-fluid Ends-->
@endsection
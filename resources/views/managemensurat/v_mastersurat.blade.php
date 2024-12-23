@extends('layouts.base')
@section('konten')
<div class="page-heading">
    <h3>Dashboard Managemen Master</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Master Surat</h4>
                        </div>
                        <div class="card-body">
                            <section class="section">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row">
                                          <div class="col">
                                            <button class="btn btn-primary"> Upload</button>
                                            <button class="btn btn-primary"> Upload</button>
                                            <button class="btn btn-primary"> Upload</button>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="table1">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>City</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Graiden</td>
                                                        <td>vehicula.aliquet@semconsequat.co.uk</td>
                                                        <td>076 4820 8838</td>
                                                        <td>Offenburg</td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dale</td>
                                                        <td>fringilla.euismod.enim@quam.ca</td>
                                                        <td>0500 527693</td>
                                                        <td>New Quay</td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nathaniel</td>
                                                        <td>mi.Duis@diam.edu</td>
                                                        <td>(012165) 76278</td>
                                                        <td>Grumo Appula</td>
                                                        <td>
                                                            <span class="badge bg-danger">Inactive</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Darius</td>
                                                        <td>velit@nec.com</td>
                                                        <td>0309 690 7871</td>
                                                        <td>Ways</td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Oleg</td>
                                                        <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                                        <td>0500 441046</td>
                                                        <td>Rossignol</td>
                                                        <td>
                                                            <span class="badge bg-success">Active</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>   
@endsection
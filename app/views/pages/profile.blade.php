@extends('layouts.default')


@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">{{$user->first_name." ".$user->last_name}}</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-9 "> 
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Department:</td>
                    <td>Programming</td>
                  </tr>
                  <tr>
                    <td>Hire date:</td>
                    <td>06/23/2013</td>
                  </tr>
                  <tr>
                    <td>Date of Birth</td>
                    <td>01/24/1988</td>
                  </tr>
               
                     <tr>
                         <tr>
                    <td>Gender</td>
                    <td>Female</td>
                  </tr>
                    <tr>
                    <td>Home Address</td>
                    <td>Kathmandu,Nepal</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><a href="mailto:info@support.com">info@support.com</a></td>
                  </tr>
                    <td>Phone Number</td>
                    <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                    </td>
                       
                  </tr>
                </tbody>
              </table>
              
              <a href="#" class="btn btn-primary">My Sales Performance</a>
              <a href="#" class="btn btn-primary">Team Sales Performance</a>
            </div>
          </div>
        </div>
        <div class="panel-footer">
                <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                <span class="pull-right">
                    <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                    <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                </span>
        </div>
    </div>
@stop
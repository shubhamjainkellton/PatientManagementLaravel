@extends('layouts')


@section('content')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Patients Admitted</p>
              </div>
              <div class="icon">
                <i class="ion fas fa-bed"></i>
              </div>
              <a href="/admit_ward" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Discharged Patients</p>
              </div>
              <div class="icon">
                <i class="ion fas fa-bed"></i>
              </div>
              <a href="/depart_ward" class="small-box-footer">View More<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

                <p>View Appointments</p>
              </div>
              <div class="icon">
                <i class="ion "></i>
              </div>
              <a href="/appointment" class="small-box-footer">View More<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

@endsection
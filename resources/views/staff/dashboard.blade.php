@extends('layouts')


@section('content')
    <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php 
                  $admit = \App\Ward::where('status', 0)->count();
                  echo $admit;
                ?>
                <sup style="font-size: 20px"></sup></h3>

                <p>Patients Admitted</p>
              </div>
              <div class="icon">
                <i class="fa fa-bed" style="font-size:48px;color:red"></i>
              </div>
              <a href="/admit_ward" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                <?php 
                  $discharge = \App\Ward::where('status', 1)->count();
                  echo $discharge;
                ?>
                <sup style="font-size: 20px"></sup></h3>

                <p>Discharged Patients</p>
              </div>
              <div class="icon">
                <i class="fa fa-bed" style="font-size:48px;color:green"></i>
              </div>
              <a href="/depart_ward" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <h3>
                <?php 
                  $appointment = \App\Appointment::count();
                  echo $appointment;
                ?>
                <sup style="font-size: 20px"></sup></h3>
                <p>View Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-alt" style="font-size:48px"></i>
              </div>
              <a href="/appointment" class="small-box-footer">View More <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

@endsection
@extends('layouts')

@section('content')
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                  <h3>
                <?php 
                  $dept =  session('department');
                  $appointment = \App\Appointment::where('department', $dept)->count();
                  echo $appointment;
                ?>
                <sup style="font-size: 20px"></sup></h3>
                <p>View Appointments</p>
              </div>
              <div class="icon">
                <i class="fa fa-calendar-alt" style="font-size:48px"></i>
              </div>
              <a href="/appointment" class="small-box-footer">View More<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

@endsection
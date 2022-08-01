@extends('layouts.adminApp')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 200vh;
    width: 100%;
}


.sidebar{
    position: fixed;
    height: 100% !important;
    width: 250px;
    background: rgb(119, 104, 193);
    /* background: rgba(119, 104, 193, 100) ; */
    /* background: #080031; */
    transition: all 0.5s ease;
}
.sidebar.active{
    width: 60px;
}
.sidebar .logo-details{
    height: 80px;
    width: 100%;
    background: #111;
    display: flex;
    align-items: center;
    /* margin-top: 15px; */   
}
.sidebar .logo-details i{
    font-size: 28px;
    color: #ff3838;
    min-width: 60px;
    text-align: center;
}
.sidebar .logo-details .logo_name{
    font-size: 24px;
    font-weight: 500;
    color: #fff;
}
.sidebar .nav-links{
    margin-top: 16px;
}
.sidebar .nav-links li{
    height: 50px;
    list-style: none;
    width: 100%;
}
.sidebar .nav-links li a{
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
}
.sidebar .nav-links li a:hover{
    background: #ec7474;
}
.sidebar .nav-links li a i{
    /* background: red; */
    min-width: 60px;
    text-align: center;
    color: #fff;
    font-size: 18px;
}
.sidebar .nav-links li a .link-name{
    color: #fff ;
    font-size: 17px;
    font-weight: 400;
    white-space: nowrap;
}

/****************** home section ******************/
.home-section{
    background: #f5f5f5;
    position: relative;
    min-height: 100vh;
    width: calc(100% - 240px);
    left: 240px;
    transition: all 0.5s ease;
}
.sidebar.active ~ .home-section{
    width: calc(100% - 60px);
    left: 60px;
}
.home-section nav{
    position: fixed;
    width: calc(100% - 240px);
    left: 240px;
    height: 80px;
    background: #fff;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.5s ease;
} 
.sidebar.active ~ .home-section nav{
    width: calc(100% - 60px);
    left: 60px;
}
.home-section nav .sidebar-btn{
    display: flex;
    align-items: center;
    font-size: 24px;
    font-weight: 400;
}
.home-section nav .sidebar-btn i{
    font-size: 25px;
    margin-right: 10px;
}
.home-section nav .profile{
    display: flex;
    align-items: center;
    height: 50px;
    min-width: 150px;
    background: #F5F6FA;
    border: 2px solid #EFEEF1;
    border-radius: 6px;
    padding: 0 15px 0 2px;
}
nav .profile i{
    margin-left: 30px;
    /* object-fit: cover;
    border-radius: 6px; */
}
nav .profile .admin-name{
    font-size: 15px;
    font-weight: 500;
    color: #333;
    margin: 0 10px;
    white-space: nowrap;
}

.buttonsub{
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}



@media (max-width: 658px){
    .home-section nav .sidebar-btn .dash{
         display: none;
    }
    .home-section nav .profile{
        min-width: 50px;
        height: 50px;
    }

}

.button {
    background-color: rgba(119, 104, 193, 100); /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
  }
  
  
  .button2:hover {
      color: rgba(119, 104, 193, 100);
      background-color: aliceblue;

      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.19),0 17px 50px 0 rgba(0,0,0,0.19);
  }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="/restaurantCategory" class="
                        button button2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    </div>

                    <div class="card-body">
                        <form action="/restaurantCategory/{{ $restaurantCategories->id }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $restaurantCategories->name }}" required>
                            </div> 
                            @error('name')
                            <span class="text-danger">{{ $message }}</span> 
                            @enderror
                            <button type="submit" class="
                            button button2">Update <i class="far fa-save"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
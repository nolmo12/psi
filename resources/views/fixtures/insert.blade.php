<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
        Add new team
    </div>
    <div class="card-body">
      <form name="add-team-post-form" id="add-team-post-form" method="post" action="{{url('store-fixture-form')}}">
       @csrf
        <div class="form-group">
          <label for="tournament_id">Tournament ID</label>
          <input type="text" id="tournament_id" name="tournament_id" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="home_team_id">Home Team ID</label>
            <input type="text" id="home_team_id" name="home_team_id" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="away_team_id">Away Team ID</label>
            <input type="text" id="away_team_id" name="away_team_id" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="home_team_score">Home Team Score</label>
            <input type="text" id="home_team_score" name="home_team_score" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="away_team_score">Away Team Score</label>
            <input type="text" id="away_team_score" name="away_team_score" class="form-control" required="">
        </div>
        <div class="form-group">
            <label for="round_number">Round Number</label>
            <input type="text" id="round_number" name="round_number" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>

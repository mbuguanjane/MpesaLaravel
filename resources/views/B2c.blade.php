<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Payemnt</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">
</head>
<body>
      <div class="container">
       <div class="row mt-5">
           <div class="col-sm-8 mx-auto">
                
                <div class="card mt-5">
                    <div class="card-header">
                     B2c Transcations
                      </div>
                      <div class="card-body">
                          <h4 id="stkPushFeedback"></h4>
                           <form action="">
                               @csrf
                               <div class="form-group">
                                   <label for="Amount"></label>
                                    <input type="number" name="b2camount" id="b2camount" class="form-control" placeholder="amount">
                               </div>
                               <div class="form-group">
                                <label for="Amount"></label>
                                 <input type="number" name="b2cPhone" id="b2cPhone" class="form-control" placeholder="Phone">
                               </div>
                               <div class="form-group">
                                <label for="Remarks"></label>
                                 <input type="text" name="b2cRemarks" id="b2cRemarks" class="form-control" placeholder="Remarks">
                                </div>
                                <div class="form-group">
                                    <label for="Occasion"></label>
                                     <input type="text" name="b2cOccasion" id="b2cOccasion" class="form-control" placeholder="Occasion">
                                    </div>
                           <button class="btn btn-primary" id="B2cTransaction">B2c Transactions</button>
                           </form>
                      </div>
                  </div>    
           </div>
       </div>
      </div>
       <script src="js/app.js"></script>
</body>
</html>
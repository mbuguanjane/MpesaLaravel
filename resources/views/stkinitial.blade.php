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
                     Stk Push Transcations
                      </div>
                      <div class="card-body">
                          <h4 id="stkPushFeedback"></h4>
                           <form action="">
                               @csrf
                               <div class="form-group">
                                   <label for="Amount"></label>
                                    <input type="number" name="stkpushamount" id="stkpushamount" class="form-control" placeholder="Amount">
                               </div>
                               <div class="form-group">
                                <label for="Amount"></label>
                                 <input type="number" name="stkpushPhone" id="stkpushPhone" class="form-control" placeholder="Phone">
                               </div>
                               <div class="form-group">
                                <label for="Account"></label>
                                 <input type="text" name="stkpushaccount" id="stkpushaccount" class="form-control" placeholder="Account">
                            </div>
                           <button class="btn btn-primary" id="stkpushTransaction">stkpush Transactions</button>
                           </form>
                      </div>
                  </div>    
           </div>
       </div>
      </div>
       <script src="js/app.js"></script>
</body>
</html>
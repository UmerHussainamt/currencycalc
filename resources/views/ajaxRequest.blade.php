@extends('layouts.apps')

@section('content')



    <div class="container">


        <h4>Currency exchange calculator</h4>
        <h6>{{$title}}</h6>
        <h6>{{$description}}</h6>
<h6>Visit <a href="http://www.floatrates.com/daily/gbp.xml" target="_blank">FloatRate</a>.</h6>

<!-- VALIDATION START-->
@if($errors->any())

<div class="alert alert-danger">
  <ul class="list-group">
    @foreach($errors->all() as $error)
      <li class="list-group-item">
        {{$error}}
      </li>
      @endforeach
    </ul>
  </div>
@endif
<!--VALIDATION END-->

<form>
<!--Currency From Input box-->
 <div class="form-group">
    <label for="thecurrencyfrom"><strong>Currency From</strong></label>
    <select multiple class="form-control" id="currencyFromButton">
      <?php foreach ($comboBoxValues as $key => $value){ ?>
      <option onlick="setCurrencyFrom('<?=$key?>')"  value="{{$key}}"><?=$value?></option>
      <?php } ?>
    </select>
  </div>



<!--Currency To Input box-->
 <div class="form-group">
    <label for="thecurrencyto"><strong>Currency To</strong></label>
    <select multiple class="form-control" id="currencyToButton">
      <?php foreach ($comboBoxValues as $key => $value){ ?>
      <option onlick="setCurrencyTo('<?=$key?>')" value="{{$key}}"><?=$value?></option>
      <?php } ?>
    </select>
  </div>




            <div class="form-group">
                <strong>Amount</strong>
                <input type="text" name="amount" class="form-control" required="">
            </div>

   

            <div class="form-group">
                <button class="btn btn-success btn-submit">Submit</button>
                  
            </div>

 <!-- <h2 id="result" /> -->

        </form>


  <div class="row justify-content-center">
    <div class="col-md">
      <div class="card card-default">
        <div class="card-header">
         <strong> Result </strong>
        </div>
        <div class="card-body">
          <ul class="list-group">
              
               <h4 style="text-align:center;" id="result"></h4>
              
          
          </ul>


    </div>





<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   

    $(".btn-submit").click(function(e){

  

        e.preventDefault();

   

        var currencyfrom = $('#currencyFromButton').val();
        if(!currencyfrom){
          alert('Enter a currency you wish to exchange from');
          return false;
        }
        currencyfrom = currencyfrom[0];

        var currencyto = $('#currencyToButton').val();
        if(!currencyto){
          alert('Enter a currency you wish to exchange to');
          return false;
        }
        currencyto = currencyto[0];
        var amount = $("input[name=amount]").val();
        if(!amount){
          alert('Enter an amount!');
        }


   
        $.ajax({

           type:'POST',

           url:'/currency',

           data:{currencyfrom:currencyfrom, currencyto:currencyto, amount:amount},

           success:function(data){

              $('#result').html(data)

           },
           error:function(xhr){
            alert(JSON.stringify(xhr.responseJSON.errors));
           }

        });

  

	});

</script>

   

</html>

@endsection
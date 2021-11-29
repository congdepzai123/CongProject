@extends('layout')
@section('content')
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
    View order details {{$order_code}}
   </div>
   
   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
         
          <th>Customer name</th>
          <th>Phone</th>
          <th>Email</th>
          
          
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <td>{{$customer->customer_name}}</td>
          <td>{{$customer->customer_phone}}</td>
          <td>{{$customer->customer_email}}</td>

        </tr>
        
      </tbody>
    </table>

  </div>
  
</div>
</div>
<br>
<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
    Shipping information
   </div>
   
   
   <div class="table-responsive">
    <?php
    $message = Session::get('message');
    if($message){
      echo '<span class="text-alert">'.$message.'</span>';
      Session::put('message',null);
    }
    ?>
    <table class="table table-striped b-t b-light">
      <thead>
        <tr>
         
        <th>Name of carrier</th>
           <th>Address</th>
           <th>Phone number</th>
           <th>Email</th>
           <th>Notes</th>
           <th>Form of payment</th>
          
          
          <th style="width:30px;"></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
         
          <td>{{$shipping->shipping_name}}</td>
          <td>{{$shipping->shipping_address}}</td>
          <td>{{$shipping->shipping_phone}}</td>
          <td>{{$shipping->shipping_email}}</td>
          <td>{{$shipping->shipping_notes}}</td>
          <td>@if($shipping->shipping_method==0) Transfer @else Cash @endif</td>
          
          
        </tr>
        
      </tbody>
    </table>

  </div>
  
</div>
</div>
<br><br>

<div class="table-agile-info">
  
  <div class="panel panel-default">
    <div class="panel-heading">
    List order details
    </div>
    
    <div class="table-responsive">
      <?php
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
      }
      ?>
      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
          <th>Order</th>
             <th>Product Name</th>
             <th>Amount of stock</th>
             <th>Discount Code</th>
             <th>Shipping fee</th>
             <th>Amount</th>
             <th>Price</th>
             <th>Original price</th>
             <th>Total amount</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          $total = 0;
          @endphp
          @foreach($order_details as $key => $details)

          @php 
          $i++;
          $subtotal = $details->product_price*$details->product_sales_quantity;
          $total+=$subtotal;
          @endphp
          <tr class="color_qty_{{$details->product_id}}">
           
            <td><i>{{$i}}</i></td>
            <td>{{$details->product_name}}</td>
            <td>{{$details->product->product_quantity}}</td>
            <td>@if($details->product_coupon!='no')
              {{$details->product_coupon}}
              @else 
              No code
              @endif
            </td>
            <td>{{number_format($details->product_feeship ,0,',','.')}}đ</td>
            <td>

              <input type="number" min="1" readonly {{$order_status==2 ? 'disabled' : ''}} class="order_qty_{{$details->product_id}}" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">

              <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$details->product_id}}" value="{{$details->product->product_quantity}}">

              <input type="hidden" name="order_code" class="order_code" value="{{$details->order_code}}">

              <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">

            

            </td>
            <td>{{number_format($details->product_price ,0,',','.')}}đ</td>
            <td>{{number_format($details->product->price_cost ,0,',','.')}}đ</td>
            <td>{{number_format($subtotal ,0,',','.')}}đ</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="2">  
              @php 
              $total_coupon = 0;
              @endphp
              @if($coupon_condition==1)
              @php
              $total_after_coupon = ($total*$coupon_number)/100;
              echo 'Total reduction :'.number_format($total_after_coupon,0,',','.').'</br>';
              $total_coupon = $total + $details->product_feeship - $total_after_coupon ;
              @endphp
              @else 
              @php
              echo 'Total reduction :'.number_format($coupon_number,0,',','.').'k'.'</br>';
              $total_coupon = $total + $details->product_feeship - $coupon_number ;

              @endphp
              @endif

              Shipping fee : {{number_format($details->product_feeship,0,',','.')}}đ</br> 
              Pay: {{number_format($total_coupon,0,',','.')}}đ 
          
            </td>
          </tr>
          
      </tbody>
    </table>
    <a target="_blank" href="{{url('/print-order/'.$details->order_code)}}">Order printing</a>
  </div>
  
</div>
</div>
@endsection
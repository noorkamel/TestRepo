<style>
    td,th{
      border: 2px solid black;
      height: 100px;
      text-align: center;
    }
  </style>


        @if (count($orders)>= 1)
        <table style="border-color: black !important; border: 2px solid black;margin-right: 30px ;width: 95%;">

          <tr>
            <th style="width: 150px" scope="col">User Name</th>
            <th scope="col">Date</th>
            <th scope="col">Total</th>
            <th scope="col">products</th>
            <th scope="col">Actions</th>
          </tr>
          @foreach ($orders as $order )
          <tr>

              <td> {{ $order->user->fname }}</td>
              <td>{{ $order->date }}</td>
              <td>{{ $order->total }}</td>
                 <td>

                @foreach ($order->products as $product)
                <ul>
                    <li>
                   <h5> {{  $product->name }} --  {{  $product->price }} --  {{  $product->pivot->quantity }}</h5>
                    </li>
                </ul>
                @endforeach
                 </td>
                 <td>
                 <form action="{{ route('delete_order', $order->id)   }}" method="post">
                    @method('delete')
                  @csrf
                  <input type="submit" value="Delete" style="width: 100%" class="btn btn-primary">
                 </form>
                </td>

            </tr>
          @endforeach
        </table>

        @else
        <h3>NO Orders in your Store</h3>
        @endif






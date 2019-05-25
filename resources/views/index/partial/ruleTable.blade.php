<div class="card">
    <div class="card-body">
        <h5 class="card-title m-b-0">道路規則</h5>
    </div>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>情境<br>
                    紅／綠燈道車輛多寡</th>
                <th>紅燈車輛數</th>
                <th>綠燈車輛數</th>
                <th>偵測後更改秒數</th>
            </tr>
            </thead>
            <tbody>

            @foreach($rules as $rule)
                <tr>
                    <td>
                        &nbsp;{{ $rule->name }}
                    </td>

                    <!-- red light -->
                    <td>
                        @foreach($rule->condition as $condition)
                            @if($condition->color == "red")
                                汽 {{ $condition->operator }} {{ $condition->car_count }}
                                <br>
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($rule->condition as $condition)
                            @if($condition->color == "green")
                                汽 {{ $condition->operator }} {{ $condition->car_count }}
                                <br>
                            @endif
                        @endforeach
                    </td>
                    <td>秒數 {{ $rule->operator }} {{ $rule->second }}</td>
                </tr>

            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

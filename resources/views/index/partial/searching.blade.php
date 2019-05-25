<div class="row">
    <div class="col-md-12" >
        <div class="card" style="height:auto">
            <div class="card-body">
                <div class="col-md-2">
                    <h5 class="card-title m-b-0">搜尋路段</h5>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2 mb-1">
                        <select id="citySelect" class="select2 form-control custom-select">
                            <option selected disabled>城市</option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 mb-1">
                        <select id="districtSelect" class="select2 form-control custom-select">
                            <option selected disabled>行政區</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select id="roadSelect" class="select2 form-control custom-select">
                            <option selected disabled>路/街</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-1">
                        <select id="intersectionSelect" class="select2 form-control custom-select">
                            <option selected disabled>路口</option>
                        </select>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

$.ajaxSetup({'cache':true});
$.getScript("js/index/updateChart.js", function(){
    $('#citySelect').on('change', function() {
        var city_id = this.value;
        var district = $('#districtSelect');
        district.empty();
        district.append('<option selected disabled>行政區</option>');
        district.prop('selectedIndex', 0);

        var road = $('#roadSelect');
        road.empty();
        road.append('<option selected disabled>街/路</option>');
        road.prop('selectedIndex', 0);

        var intersection = $('#intersectionSelect');
        intersection.empty();
        intersection.append('<option selected disabled>路口</option>');
        intersection.prop('selectedIndex', 0);

        $.ajax({
            url:'api/query/city',
            method:"GET",
            data: {'id': city_id},
            dataType:"json",
            success:function(data)
            {
                $.each(data.districts, function (key, entry) {
                    district .append($('<option></option>').attr('value', entry.id).text(entry.name));
                })
            }
        })
    });

    $('#districtSelect').on('change', function() {
        var district_id = this.value;
        var road = $('#roadSelect');
        road.empty();
        road.append('<option selected disabled>街/路</option>');
        road.prop('selectedIndex', 0);

        var intersection = $('#intersectionSelect');
        intersection.empty();
        intersection.append('<option selected disabled>路口</option>');
        intersection.prop('selectedIndex', 0);

        $.ajax({
            url:'api/query/district',
            method:"GET",
            data: {'id': district_id},
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                $.each(data.roads, function (key, entry) {
                    road.append($('<option></option>').attr('value', entry.id).text(entry.name));
                })
            }
        })
    });

    $('#roadSelect').on('change', function() {
        var road_id = this.value;
        var intersection = $('#intersectionSelect');
        intersection.empty();
        intersection.append('<option selected disabled>路口</option>');
        intersection.prop('selectedIndex', 0);

        $.ajax({
            url:'api/query/road',
            method:"GET",
            data: {'id': road_id},
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                $.each(data.intersections, function (key, entry) {
                    intersection.append($('<option></option>').attr('value', entry.id).text(entry.name));
                })
            }
        })
    });

    $('#intersectionSelect').on('change', function() {
        var intersection_id = this.value;

        //該路口的所有道路 更改秒數用的
        var intersection_road = $('#intersection_road_Select');
        intersection_road.empty();
        intersection_road.append('<option selected disabled>路口</option>');
        intersection_road.prop('selectedIndex', 0);

        $.ajax({
            url:'api/query/intersection_road',
            method:"GET",
            data: {'id': intersection_id},
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                $.each(data.roads, function (key, entry) {
                    intersection_road.append($('<option></option>').attr('value', entry.id).text(entry.name));
                })
            }
        });

        refreshPie(myPieChart, intersection_id);
        // refreshFlow(flowChart);
        refreshDatatable(maintenance_table, intersection_id);
        $('#rule').show();
        $('#intersection_road').show();
        $('#bar').hide();

        //路口有哪些道路方向，顯示出來
        var intersection_road = $('#intersection_road_Select');
        intersection_road.empty();
        intersection_road.append('<option selected disabled>請選擇路口</option>');
        intersection_road.prop('selectedIndex', 0);

        $.ajax({
            url:'api/query/intersection_road',
            method:"GET",
            data: {'id': intersection_id},
            dataType:"json",
            success:function(data)
            {
                console.log(data);
                $.each(data.roads, function (key, entry) {
                    intersection_road.append($('<option></option>').attr('value', entry.id).text(entry.name));
                });

                $('#now_direct').text(data.now_direct);
                $('#now_second').text(data.now_second);
            }
        });
    });

    function getParamHandler(){
        var url_string = window.location.href;
        var url = new URL(url_string);
        var intersection_id = url.searchParams.get("intersection_id");

        if (intersection_id !== null){
            refreshPie(myPieChart, intersection_id);
            // refreshFlow(flowChart);
            refreshDatatable(maintenance_table, intersection_id);
            $('#rule').show();
            $('#intersection_road').show();
            $('#bar').hide();

            //路口有哪些道路方向，顯示出來
            var intersection_road = $('#intersection_road_Select');
            intersection_road.empty();
            intersection_road.append('<option selected disabled>請選擇路口</option>');
            intersection_road.prop('selectedIndex', 0);

            $.ajax({
                url:'api/query/intersection_road',
                method:"GET",
                data: {'id': intersection_id},
                dataType:"json",
                success:function(data)
                {
                    console.log(data);
                    $.each(data.roads, function (key, entry) {
                        intersection_road.append($('<option></option>').attr('value', entry.id).text(entry.name));
                    });

                    $('#now_direct').text(data.now_direct);
                    $('#now_second').text(data.now_second);
                }
            });
        }

    }

    getParamHandler();
});


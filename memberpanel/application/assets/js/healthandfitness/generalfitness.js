$(document).ready(function(){

$('#vo2max').DataTable({
    "ordering": false
});
$("#pushup").DataTable({
    "ordering": false,
     language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});

//situptest
$("#situptest").DataTable({
    "ordering": false,
     language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
//onerepeatationmaxtest
$("#onerepeatationmaxtest").DataTable({
    "ordering": false,
     language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
//bldpressure
$("#bldpressure").DataTable({
    "ordering": false,
     language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
//oxysatlvl
$("#oxysatlvl").DataTable({
    "ordering": false,
     language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});
//visualactivity
$("#visualactivity").dataTable({
   "ordering": false ,
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    }
});

$('.ex1').slider({
        precision: 2,
        tooltip:"show",
        tooltip:"always"
        
});

});
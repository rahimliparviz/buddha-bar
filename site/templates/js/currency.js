// $(document).ready(function() {
//     $(".cur").click(function(event) {

//         event.preventDefault();
//         var a = $(this).data("name");
//         $.ajax({
//                 type: 'GET',
//                 url: `https://free.currencyconverterapi.com/api/v6/convert?q=AZN_${a}&compact=y`,

//                 // url: `http://valyuta.com/api/get_rate_current_all/AZN/${a}`,

//             })
//             .done(function(response) {

//                 console.log(response[`AZN_${a}`].val)

//                 $('#cur').val(response[`AZN_${a}`].val + " " + a);

//                 $('#cur_form').submit();

//             }).fail(function(data) {
//                 console.log('fail')
//             });
//     });
// })
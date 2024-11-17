// $(document).ready(function () {
//     let categories = ['.all-products', '.vegetables', '.fruits', '.breads', '.meats'];

//     categories.forEach((element) => {
//         $(element).hover(
//             (event) => { // Sử dụng arrow function với event
//                 $(event.currentTarget).addClass('active'); // Dùng event.currentTarget thay cho this
//             },
//             (event) => {
//                 $(event.currentTarget).removeClass('active');
//             }
//         );
//     });
// });


// differnce between arrow function vs function 


$(document).ready(function () {
    let categories = ['.all-products', '.vegetables', '.fruits', '.breads', '.meats'];

    categories.forEach((element) => {
        $(element).hover(
            function () { // Sử dụng arrow function với event
                $(this).addClass('active'); // Dùng event.currentTarget thay cho this
            },
            function () {
                $(this).removeClass('active');
            }
        );
    });
});
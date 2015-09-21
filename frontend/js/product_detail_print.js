/*
 * For Printing product detail
 */
var ProductDetailPrint = (function() {

    /*
     * Append multiple forms upload  picture
     *
     * @public
     * @param 
     * @return void
     */
    var print_product_detail = function(divName){
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    };

    return {
        print_product_detail: print_product_detail
    };
}());
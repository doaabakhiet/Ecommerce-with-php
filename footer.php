<!--footer-->
<footer id="footer" class="bg-primary text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 py-2">
                    <h3 class="fw-bold">Fashion Shopee</h3>
                    <p class="fs-6 ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit accusantium delectus, sapiente id culpa ipsa et esse doloremque sed incidunt?</p>
                </div>
                <div class="col-lg-1 col-12"></div>
                <div class="col-lg-4 col-12 py-2">
                    <h3 class="fw-bold">News Letter</h3>
                    <form class="d-flex">
                        <input class="form-control me-2" type="Email" placeholder="Email" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Email</button>
                    </form>
                </div>
                <div class="col-lg-1 col-12"></div>
                <div class="col-lg-3 col-12 py-2">
                    <h3 class="fw-bold">News Letter</h3>   
                    <a href="#" class="text-light">About Us</a> <br>
                    <a href="#" class="text-light">Delivery Information</a> <br>
                    <a href="#" class="text-light">Privacy Policy</a> <br>
                    <a href="#" class="text-light">Terms & Conditions</a> <br>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <div class="copyright py-3">
                        <p>&copy;CopyRight 2022 ,made by Doaa Bakhiet  

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--footer-->
        <!-- boostrap 5 -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./index.js"></script>
    <script>
    $(document).ready(function(){
        //console.log($('.qty-input').val());
        $('.qty-up').click(function(e){
            $input=$(`.qty .qty-input[data-id='${$(this).data("id")}']`).val();
            let $price=$(`.price[data-id='${$(this).data("id")}']`);
            let $item_price=$('#item_price');
        if($(`.qty .qty-input[data-id='${$(this).data("id")}']`).val()>=0 && $(`.qty .qty-input[data-id='${$(this).data("id")}']`).val()<=9){
            $(`.qty .qty-input[data-id='${$(this).data("id")}']`).val(function(i,oldVal){
                return ++oldVal;
            });
        }

        
            $.ajax(
                {
                    url:"ajax.php",
                    type:"post",
                    data:{'item_id':$(this).data('id')},
                    success:function(result){
                        let obj=JSON.parse(result);
                        let item_price=obj[0]['item_price'];
                        $price.text(parseInt(item_price * $input).toFixed(2));
                        let subtotal=parseInt($item_price.text())+parseInt(item_price);
                        $item_price.text(subtotal.toFixed(2));
                    }
                }
            )
            });

        $('.qty-down').click(function(e){
            $input=$(`.qty .qty-input[data-id='${$(this).data("id")}']`).val();
            let $price=$(`.price[data-id='${$(this).data("id")}']`);
            let $item_price=$('#item_price');
        if($(`.qty .qty-input[data-id='${$(this).data("id")}']`).val()>0 && $(`.qty .qty-input[data-id='${$(this).data("id")}']`).val()<=9){
            $(`.qty .qty-input[data-id='${$(this).data("id")}']`).val(function(i,oldVal){
                return --oldVal;
            });
        }
        $.ajax(
                {
                    url:"ajax.php",
                    type:"post",
                    data:{'item_id':$(this).data('id')},
                    success:function(result){
                        let obj=JSON.parse(result);
                        let item_price=obj[0]['item_price'];
                        $price.text(parseInt(item_price * $input).toFixed(2));
                        let subtotal=parseInt($item_price.text())-parseInt(item_price);
                        $item_price.text(subtotal.toFixed(2));
                    }
                }
            )
        });
    });
</script>
</body>
</html>
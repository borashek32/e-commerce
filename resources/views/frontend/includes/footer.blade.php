<!-- Footer-->
<footer class="pt-4 my-md-5 pt-md-5 border-top" style="transform: translateY(40px)">
    <div class="row">
        <div class="col-12 col-md">
            <img src="/img/digitalCoffeeSm.jpg" alt="Digital coffee design">

            <p class="d-block mb-3 text-muted"><a href="http://digitalcoffeedesign.com">&copy; Digital<br>coffee design</a><br>
                <?= date('Y') ?>
            </p>
        </div>

        <div class="col-6 col-md">
            <h6>Brands</h6>

            <ul>
                @foreach($brands as $brand)
                    <li style="list-style: none; font-size: 12px; margin-left: -50px">
                        <a href="{{ route('brand', $brand->slug) }}">
                            {{ $brand->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-6 col-md">
            <h6>Our Partners</h6>
        </div>

        <div class="col-6 col-md">
            <h6>About Us</h6>
        </div>
    </div>
</footer>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('assets/frontend/js/scripts.js') }}"></script>

<script>
    setTimeout(function (){
        $('#alert').slideUp();
    }, 4000);
</script>

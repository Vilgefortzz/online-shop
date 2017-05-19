@extends('layouts.app_without_footer')

@section('content')
    <div class="container container-fix">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_without_border panel-default">
                    <div class="panel-heading text-center">
                        <h2 style="margin-top: 0"><span class="glyphicon glyphicon-thumbs-up"></span>You have successfully placed an order</h2>
                    </div>

                    <div class="panel-body">
                        <h3>Thank you for your purchase. Visit our shop again. Don't forget to give a review to the products</h3>
                        <h5 style="margin-top: 40px; text-decoration: underline">For the moment you will be redirected to main page</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        // Redirect to main page after x miliseconds

        $(document).ready(function () {
            window.setTimeout(function () {
                location.href = "/";
            }, 8000);
        });

    </script>
@endsection
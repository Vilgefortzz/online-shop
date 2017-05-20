@extends('layouts.app')

@section('content')

    <div class="container container-fix">

        <div class="panel panel-default panel_without_border">

            <div class="panel-heading text-center">
                <h1 class="bigger_header">FAQ</h1>
            </div>

            <div class="panel-body">
                <ul class="list-group">
                    <li id="faq_1" class="faq_group list-group-item">
                        <b>How can i buy products?</b>
                        <p id="answer_1" class="answer_group" hidden>
                            Easily, add to cart your products and make an order.
                        </p>
                    </li>

                    <li id="faq_2" class="faq_group list-group-item">
                        <b>How you can contact with us?</b>
                        <p id="answer_2" class="answer_group" hidden>
                            Via e-mail: shop@gmail.com or phone: 000 000 000.
                        </p>
                    </li>

                    <li id="faq_3" class="faq_group list-group-item">
                        <b>When the product is broken. What could i do?</b>
                        <p id="answer_3" class="answer_group" hidden>
                            Don't panic you can exchange the broken product to another or we can give your money back.
                        </p>
                    </li>

                    <li id="faq_4" class="faq_group list-group-item">
                        <b>Are there any discount for having account?</b>
                        <p id="answer_4" class="answer_group" hidden>
                            Yes, for users who have an account in our shop there is a $20 discount when ordering.
                        </p>
                    </li>

                </ul>
            </div>

        </div>
    </div>

    <script type="text/javascript">

        /**
         * FAQ
         */

        $('.faq_group').on('click', function () {

            var faq_id = $(this).attr('id');
            var id = faq_id.split('_')[1];

            $('#answer_' + id).slideDown();
        });

    </script>
@endsection
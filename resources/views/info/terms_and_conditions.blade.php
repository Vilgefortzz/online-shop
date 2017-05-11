@extends('layouts.app')

@section('content')


    <div class="container container-fix">

        <div class="panel panel-default panel_without_border">

            <div class="panel-heading text-center">
                <h1 class="bigger_header">Terms and conditions</h1>
            </div>

            <div class="panel-body">
                <p><strong>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DEFINITIONS</strong></p>
                <p>1.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Buyer" means the individual or organisation who buys or agrees to buy the Goods from the Seller;</p>
                <p>1.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Consumer" shall have the meaning ascribed in section 2 of the Consumer Rights Act 2015;</p>
                <p>1.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Contract" means the contract between the Seller and the Buyer for the sale and purchase of Goods incorporating these Terms and Conditions;</p>
                <p>1.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Goods" means the articles (including any digital content) that the Buyer agrees to buy from the Seller;</p>
                <p>1.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Seller" means {{config('app.name')}} International Ltd of 2a Mochdre Commerce Parc, Conwy that owns and operates www.knights&warriors.herokuapp.com</p>
                <p>1.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Terms and Conditions" means the terms and conditions of sale set out in this agreement and any special terms and conditions agreed in writing by the Seller;</p>
                <p>1.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "Website" means www.knights&warriors.herokuapp.com</p>
                <p><strong>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CONDITIONS</strong></p>
                <p>2.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nothing in these Terms and Conditions shall affect the Buyer&rsquo;s statutory rights as a Consumer.</p>
                <p>2.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; These Terms and Conditions shall apply to all contracts for the sale of Goods by the Seller to the Buyer and shall prevail over any other documentation or communication from the Buyer.</p>
                <p>2.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Acceptance of delivery of the Goods shall be deemed conclusive evidence of the Buyer&rsquo;s acceptance of these Terms and Conditions.</p>
                <p>2.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Any variation to these Terms and Conditions (including any special terms and conditions agreed between the parties) shall be inapplicable unless agreed in writing by the Seller.</p>
                <p>2.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Any complaints should be addressed to the Seller's address stated in clause 1.5.</p>
                <p><strong>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ORDERING</strong></p>
                <p>3.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; All orders for Goods shall be deemed to be an offer by the Buyer to purchase Goods pursuant to these Terms and Conditions and are subject to acceptance by the Seller.&nbsp; The Seller may choose not to accept an order for any reason.</p>
                <p>3.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where the Goods ordered by the Buyer are not available from stock the Buyer shall be notified and given the option to either wait until the Goods are available from stock or cancel the order and receive a full refund within 14 days.</p>
                <p>3.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; When making an order through the Website, the technical steps the Buyer needs to take to complete the order process are described in UK orders or International orders.</p>
                <p>3.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If you pay using your credit card, the payment will be processed through our PayPal merchant account. We also use PayPal Reference Transactions to additionally charge your credit card for any extra upsell offers you decide to purchase or changes after your main order has completed.</p>
                <p><strong>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; PRICE AND PAYMENT</strong></p>
                <p>4.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The price of the Goods shall be that stipulated on the Website. The price is inclusive of VAT.&nbsp;</p>
                <p>4.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The total purchase price, including VAT, delivery and other charges, if any, will be displayed in the Buyer&rsquo;s shopping cart prior to confirming the order.</p>
                <p>4.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; After the order is received the Seller shall confirm by email the details, description and price for the Goods together with information on the right to cancel if the Buyer is a Consumer.</p>
                <p>4.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Payment of the price plus VAT and delivery charges must be made in full before dispatch of the Goods.</p>
                <p><strong>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RIGHTS OF SELLER</strong></p>
                <p>5.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Seller reserves the right to periodically update prices on the Website, which cannot be guaranteed for any period of time.&nbsp; The Seller shall make every effort to ensure prices are correct at the point at which the Buyer places an order.</p>
                <p>5.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Seller reserves the right to withdraw any Goods from the Website at any time.</p>
                <p>5.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Seller shall not be liable to anyone for withdrawing any Goods from the Website or for refusing to process an order.</p>
                <p><strong>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AGE OF CONSENT</strong></p>
                <p>6.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where Goods may only be purchased by persons of a certain age the Buyer will be asked when placing an order to declare that they are of the appropriate legal age to purchase the Goods.</p>
                <p>6.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If the Seller discovers that the Buyer is not legally entitled to order certain Goods, the Seller shall be entitled to cancel the order immediately, without notice.</p>
                <p><strong>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; DELIVERY </strong></p>
                <p>7.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Goods supplied within the UK will normally be delivered within 7 working days of acceptance of order but in any event, within 30 days after the Contract is entered into.</p>
                <p>7.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Goods supplied outside the UK will normally be delivered within 14 working days of acceptance of order but in any event, within 30 days after the Contract is entered into.</p>
                <p>7.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Where a specific delivery date has been agreed, and where this delivery date cannot be met, the Buyer will be notified and given the opportunity to agree a new delivery date or receive a full refund.</p>
                <p>7.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Delivery of the Goods shall be made to the Buyer&rsquo;s address specified in the order and the Buyer shall make all arrangements necessary to take delivery of the Goods whenever they are tendered for delivery. The Seller is under a legal obligation to supply Goods in conformity with the Contract.</p>
                <p>7.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Risk in the Goods shall pass to the Buyer when they are in the physical possession of the Buyer.</p>
                <p>7.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Title in the Goods shall not pass to the Buyer until payment of the price has been made in full.</p>
                <p><strong>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CANCELLATION </strong></p>
                <p>The Buyer, if a Consumer, has the right to cancel the Contract within 14 days without giving any reason. The conditions, time limits and procedures for exercising the Buyer&rsquo;s right to cancel are laid out in the Schedule to these Terms and Conditions together with a cancellation form, in accordance with The Consumer Contracts (Information, Cancellation and Additional Charges) Regulations 2013.</p>
                <p>&nbsp;</p>
                <p><strong>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; REMEDY FOR BREACH</strong></p>
                <p>All Goods (including digital content) supplied by the Seller must be as described, fit for purpose and of satisfactory quality. If the Goods are faulty, the Buyer is entitled to a repair or a replacement. If the fault cannot be fixed within a reasonable time, or without causing the Buyer significant inconvenience, the Buyer is entitled to a full or partial refund.</p>
                <p><strong>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; LIMITATION OF LIABILITY</strong></p>
                <p>10.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Seller shall not be responsible for:</p>
                <p>10.1.1&nbsp;&nbsp; losses that were not caused by any breach on the part of the Seller; or</p>
                <p>10.1.2&nbsp;&nbsp; any business loss (including loss of profits, revenue, contracts, anticipated savings, data, goodwill or wasted expenditure); or</p>
                <p>10.1.3&nbsp;&nbsp; any indirect or consequential losses that were not foreseeable to both the Buyer and the Seller.</p>
                <p>10.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Seller shall not be held responsible for any delay or failure to comply with its obligations under these Terms and Conditions if the delay or failure arises from any cause which is beyond its reasonable control. This condition does not affect the Buyer&rsquo;s legal right to have Goods sent within a reasonable time or to receive a refund if Goods ordered cannot be supplied within a reasonable time owing to a cause beyond the Seller&rsquo;s reasonable control.</p>
                <p>10.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nothing in these Terms and Conditions limits or excludes the Seller&rsquo;s responsibility for fraudulent representations made by it or for death or personal injury caused by the Seller&rsquo;s negligence or wilful misconduct.</p>
                <p><strong>11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WAIVER</strong></p>
                <p>No waiver by the Seller (whether express or implied) in enforcing any of its rights under this contract shall prejudice its rights to do so in the future.</p>
                <p><strong>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FORCE MAJEURE</strong></p>
                <p>The Seller shall not be liable for any delay or failure to perform any of its obligations if the delay or failure results from events or circumstances outside its reasonable control, including but not limited to, acts of God, strikes, lock outs, accidents, war, fire, failure of any communications, telecommunications or computer system, breakdown of plant or machinery or shortage or unavailability of raw materials from a natural source of supply, and the Seller shall be entitled to a reasonable extension of its obligations.</p>
                <p><strong>13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEVERANCE</strong></p>
                <p>If any term or provision of these Terms and Conditions is held invalid, illegal or unenforceable for any reason by any court of competent jurisdiction such provision shall be severed and the remainder of the provisions hereof shall continue in full force and effect as if these Terms and Conditions had been agreed with the invalid illegal or unenforceable provision eliminated.</p>
                <p><strong>14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CHANGES TO TERMS AND CONDITIONS</strong></p>
                <p>The Seller shall be entitled to alter these Terms and Conditions at any time but this right shall not affect the existing Terms and Conditions accepted by the Buyer upon making a purchase.</p>
                <p><strong>15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GOVERNING LAW AND JURISDICTION</strong></p>
                <p>These Terms and Conditions shall be governed by and construed in accordance with the law of England and the parties hereby submit to the exclusive jurisdiction of the English courts.</p>
                <p>&nbsp;</p>
                <p><strong>SCHEDULE</strong></p>
                <p><strong>RIGHT TO CANCEL</strong></p>
                <p>1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You have the right to cancel this contract within 14 days without giving any reason.</p>
                <p>2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The cancellation period will expire after 14 days from the day:&nbsp;&nbsp;&nbsp;&nbsp;</p>
                <ul>
                    <li>of the conclusion of the contract, in the case of a service contract or a contract for the supply of digital content which is not supplied on a tangible medium;</li>
                </ul>
                <ul>
                    <li>on which you acquire, or a third party other than the carrier and indicated by you acquires, physical possession of the goods, in the case of a sales contract;</li>
                </ul>
                <ul>
                    <li>on which you acquire, or a third party other than the carrier and indicated by you acquires, physical possession of the last good, in the case of a contract relating to multiple goods ordered by the consumer in one order and delivered separately;</li>
                </ul>
                <ul>
                    <li>on which you acquire, or a third party other than the carrier and indicated by you acquires, physical possession of the last lot or piece, in the case of a contract relating to delivery of a good consisting of multiple lots or pieces;</li>
                    <li>
                        <p>on which you acquire, or a third party other than the carrier and indicated by you acquires, physical possession of the first good, in the case of a contract for regular delivery of goods during a defined period of time.</p>
                    </li>
                </ul>
                <p>3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To exercise the right to cancel, you must inform us, {{config('app.name')}} International Ltd of your decision to cancel this contract by a clear statement (e.g. a letter sent by post, fax or e-mail). You may use the attached model cancellation form, but it is not obligatory.</p>
                <p>If you electronically fill in and submit the model cancellation form or any other clear statement on our website we will communicate to you an acknowledgement of receipt of such a cancellation on a durable medium (e.g. by e-mail) without delay.</p>
                <p>4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To meet the cancellation deadline, it is sufficient for you to send your communication concerning your exercise of the right to cancel before the cancellation period has expired.</p>
                <p><strong>EFFECTS OF CANCELLATION</strong></p>
                <p>5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; If you cancel this contract, we will reimburse to you all payments received from you, including the costs of delivery (except for the supplementary costs arising if you chose a type of delivery other than the least expensive type of standard delivery offered by us).</p>
                <p>6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We may make a deduction from the reimbursement for loss in value of any goods supplied, if the loss is the result of unnecessary handling by you.</p>
                <p>7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We will make the reimbursement without undue delay, and not later than:</p>
                <ul>
                    <li>14 days after the day we receive back from you any goods supplied, or</li>
                </ul>
                <ul>
                    <li>(if earlier) 14 days after the day you provide evidence that you have returned the goods, or<br /><br /></li>
                    <li>&nbsp;if there were no goods supplied, 14 days after the day on which we are informed about your decision to cancel this contract.</li>
                </ul>
                <p>8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We will make the reimbursement using the same means of payment as you used for the initial transaction unless you have expressly agreed otherwise; in any event, you will not incur any fees as a result of the reimbursement.</p>
                <p>9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In the event of cancellation we may withhold reimbursement until we have received the goods back (where we have not offered to collect the goods) or you have supplied evidence of having sent back the goods, whichever is the earliest.</p>
                <p>10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; We must receive returned goods within 14 days of notice of cancellation. If good are received later than this date no refund will be issued.</p>
                <p><strong>RETURN OF GOODS</strong></p>
                <p>11<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>After informing us of cancellation you have 14 days to return your item to us. We are unable to process refunds for returns that arrive to us after this period.</p>
                <p>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You shall send back the goods or hand them over to us at Returns, {{config('app.name')}} International Ltd, 2a Mochdre Commerce Parc, Colwyn Bay, Conwy, LL28 5HX without undue delay and in any event not later than 14 days from the day on which you communicate your cancellation from this contract to us. The deadline is met if you send back the goods before the period of 14 days has expired.</p>
                <p><strong>COST OF RETURNING GOODS</strong></p>
                <p>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You will have to bear the direct cost of returning the goods.</p>
            </div>
        </div>
    </div>
@endsection
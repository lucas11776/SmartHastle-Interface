<table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
       style="margin: auto;">
    <tr>
        <td valign="middle" class="bg_light footer email-section">
            <table>
                <tr>
                    <td valign="top" width="33.333%" style="padding-top: 20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: left; padding-right: 10px;">
                                    <h3 class="heading">About</h3>
                                    <p>SmartHustel description in news letter.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="33.333%" style="padding-top: 20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                    <h3 class="heading">Contact Info</h3>
                                    <ul>
                                        <li>
                                            <span class="text">
                                                Orange Farm. 1841, RSA
                                            </span>
                                        </li>
                                        <li>
                                            <a href="tel:">
                                                <span class="text">
                                                    +2 392 3929 210
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:{{ env('MAIL_FROM_ADDRESS') }}">
                                                <span class="text">
                                                    {{ env('MAIL_FROM_ADDRESS') }}
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td valign="top" width="33.333%" style="padding-top: 20px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="text-align: left; padding-left: 10px;">
                                    <h3 class="heading">Quicks Links</h3>
                                    <ul>
                                        <li>
                                            <a href="{{ url('') }}">
                                                Home
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('cart') }}">
                                                Cart
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('my/favorites') }}">
                                                Favorites
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('my/orders') }}">
                                                Order
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr><!-- end: tr -->
    <tr>
        @if(isset($unsubscribe) && $unsubscribe == true)
            <td class="bg_white" style="text-align: center;">
                <p>
                    No longer want to receive these email? You can <a href="#" style="color: rgba(0,0,0,.8);">Unsubscribe here</a>
                </p>
            </td>
        @endif

    </tr>
</table>

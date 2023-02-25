<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Personal trading chart</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <div class="tradingview-widget-container">
                    <div id="tradingview_f933e"></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                    <script type="text/javascript">
                        new TradingView.widget({
                            "width": "100%",
                            "height": "300",
                            "symbol": "COINBASE:BTCUSD",
                            "interval": "1",
                            "timezone": "Etc/UTC",
                            "theme": '',
                            "style": "9",
                            "locale": "en",
                            "toolbar_bg": "#f1f3f6",
                            "enable_publishing": false,
                            "hide_side_toolbar": false,
                            "allow_symbol_change": true,
                            "calendar": false,
                            "studies": [
                                "BB@tv-basicstudies"
                            ],
                            "container_id": "tradingview_f933e"
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">@lang('message.forex_chart')</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
            </div>
        </div>

        <span id="tradingview-copyright"><a ref="nofollow noopener" target="_blank" href="http://www.tradingview.com"
                style="color: rgb(173, 174, 176); font-family: &quot;Trebuchet MS&quot;, Tahoma, Arial, sans-serif; font-size: 13px;"></a></span>
        <script src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js">
            {
                "currencies": [
                    "EUR", "USD", "JPY", "BTC", "ETH", "LTC", "GBP", "CHF", "AUD", "CAD", "NZD", "CNY"
                ],
                "isTransparent": false,
                "colorTheme": "",
                "width": "100%",
                "height": "100%",
                "locale": "en"
            }
        </script>
    </div>
</div>

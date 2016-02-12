<hr/>
<div id="stocksPanel">
    {stockportfolios}
    <hr id="line"/>
    <a href="{href}"><img src="/data/{mug}" title="{who}" id="oneStock"/></a>
    <br/><h5>Current value: ?</h5>
    {/stockportfolios}
</div> 

<div id="playersPanel">
    {portfolios}
    <hr id="line"/>
    <p>
    <!-- <a href="{href}"><img src="/assets/images/logo.png" title="{who}" id="onePlayer" align="left"/></a> -->
        <a href="{href}"><p>{who}</p></a>
    <p>Equity: <br/>Cash:</p><br/>
    {/portfolios}
</div>
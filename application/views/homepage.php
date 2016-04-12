<hr/>
<div id="stocksPanel">
    <h3>STOCKS</h3>
    {stockportfolios}
    <hr id="line"/>
    <a href="stock/{what}"><p>{what}</p></a>
    <p>Current value: {value}</p>
    {/stockportfolios}
</div> 

<div id="playersPanel">
    <h3>PLAYERS</h3>
    {portfolios}
    <hr id="line"/>
    <p>
        <a href="player/{who}"><p>{who}</p></a>
    <p>Equity:{equity} <br/>Cash: {cash}</p><br/>
    {/portfolios}
</div>
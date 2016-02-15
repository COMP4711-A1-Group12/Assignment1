<hr/>
<div id="stocksPanel">
    {stockportfolios}
    <hr id="line"/>
    <a href="stock/{what}"><p>{what}</p></a>
    <br/><h5>Current value: {value}</h5>
    {/stockportfolios}
</div> 

<div id="playersPanel">
    {portfolios}
    <hr id="line"/>
    <p>
        <a href="player/{who}"><p>{who}</p></a>
    <p>Equity: <br/>Cash: {cash}</p><br/>
    {/portfolios}
</div>
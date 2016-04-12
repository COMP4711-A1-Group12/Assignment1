<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//restrited to admin
//links: redownload stock data from bsx OR monitor bsx server for game status
//set defaults: frequency of state checking OR transaction tracking


/*register with bsx server 
 * IF game is "ready" or "open" POST to bsx/register:
 * team: B00
 * name: team name
 * password: on d2l
 * 
 * server responds with xml document with team code, auth token. valid for max 2
 * 
 */
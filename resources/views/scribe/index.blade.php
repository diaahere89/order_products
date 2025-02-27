<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Order Stock Mangement API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:3020";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.1.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.1.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-logout">
                                <a href="#endpoints-POSTapi-logout">POST api/logout</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-user">
                                <a href="#endpoints-GETapi-v1-user">GET api/v1/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-orders">
                                <a href="#endpoints-GETapi-v1-orders">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-orders--id-">
                                <a href="#endpoints-GETapi-v1-orders--id-">Display the specified resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-v1-orders--id-">
                                <a href="#endpoints-DELETEapi-v1-orders--id-">Remove the specified resource from storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-products">
                                <a href="#endpoints-GETapi-v1-products">Display a listing of the resource.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: February 27, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:2202</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:2202/api/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 3,
    &quot;name&quot;: &quot;Wendy Hills&quot;,
    &quot;email&quot;: &quot;schinner.paolo@example.com&quot;,
    &quot;email_verified_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
    &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-user"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:2202/api/login" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"+-0pBNvYgxwmi\\/#iw\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/login"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "+-0pBNvYgxwmi\/#iw"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-login"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="+-0pBNvYgxwmi/#iw"
               data-component="body">
    <br>
<p>Must be at least 8 characters. Example: <code>+-0pBNvYgxwmi/#iw</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-logout">POST api/logout</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:2202/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="POSTapi-logout"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-logout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-user">GET api/v1/user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:2202/api/v1/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/v1/user"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;id&quot;: 3,
    &quot;name&quot;: &quot;Wendy Hills&quot;,
    &quot;email&quot;: &quot;schinner.paolo@example.com&quot;,
    &quot;email_verified_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
    &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-user" data-method="GET"
      data-path="api/v1/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-user"
                    onclick="tryItOut('GETapi-v1-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-user"
                    onclick="cancelTryOut('GETapi-v1-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-user"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-orders">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:2202/api/v1/orders" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/v1/orders"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 5,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;ullam sapiente mollitia&quot;,
                &quot;description&quot;: &quot;Repudiandae et ut quia sequi aliquid sint nisi. Deserunt sapiente dolores assumenda error dignissimos voluptatibus. Et sed quod et vitae.&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;date&quot;: &quot;1966-11-10&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 15,
                        &quot;name&quot;: &quot;doloremque et quia&quot;,
                        &quot;price&quot;: &quot;54.72&quot;,
                        &quot;stock&quot;: 11,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 5,
                            &quot;product_id&quot;: 15,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 21,
                        &quot;name&quot;: &quot;et explicabo vel&quot;,
                        &quot;price&quot;: &quot;94.20&quot;,
                        &quot;stock&quot;: 22,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 5,
                            &quot;product_id&quot;: 21,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 26,
                        &quot;name&quot;: &quot;fugit ut cum&quot;,
                        &quot;price&quot;: &quot;71.37&quot;,
                        &quot;stock&quot;: 12,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 5,
                            &quot;product_id&quot;: 26,
                            &quot;quantity&quot;: 6,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 47,
                        &quot;name&quot;: &quot;qui quidem nemo&quot;,
                        &quot;price&quot;: &quot;23.48&quot;,
                        &quot;stock&quot;: 7,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 5,
                            &quot;product_id&quot;: 47,
                            &quot;quantity&quot;: 1,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 48,
                        &quot;name&quot;: &quot;sint voluptates voluptas&quot;,
                        &quot;price&quot;: &quot;52.47&quot;,
                        &quot;stock&quot;: 9,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 5,
                            &quot;product_id&quot;: 48,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/5&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 33,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 33,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-26T22:39:51.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:41:14.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 33,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-26T22:39:51.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:41:14.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/33&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 34,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;alias id nisi&quot;,
                &quot;description&quot;: &quot;Quibusdam rerum voluptatem non illum. Molestiae sint dolores earum cum. Non odit nobis repellat autem. Praesentium qui voluptas qui dolore iste ratione.&quot;,
                &quot;status&quot;: &quot;C&quot;,
                &quot;date&quot;: &quot;2013-10-08&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 34,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;sapiente non impedit&quot;,
                        &quot;price&quot;: &quot;87.66&quot;,
                        &quot;stock&quot;: 8,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 34,
                            &quot;product_id&quot;: 5,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 36,
                        &quot;name&quot;: &quot;voluptatem dolorem harum&quot;,
                        &quot;price&quot;: &quot;58.27&quot;,
                        &quot;stock&quot;: 14,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 34,
                            &quot;product_id&quot;: 36,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/34&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 39,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;dolore autem consectetur&quot;,
                &quot;description&quot;: &quot;Ut et aperiam repudiandae provident sed est dolor. Molestias libero sint voluptatem odit dolor. Dolore ullam nemo reiciendis odit.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;2013-09-26&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 9,
                        &quot;name&quot;: &quot;corrupti cum distinctio&quot;,
                        &quot;price&quot;: &quot;4.69&quot;,
                        &quot;stock&quot;: 23,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 39,
                            &quot;product_id&quot;: 9,
                            &quot;quantity&quot;: 3,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 28,
                        &quot;name&quot;: &quot;rem ut qui&quot;,
                        &quot;price&quot;: &quot;28.15&quot;,
                        &quot;stock&quot;: 13,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 39,
                            &quot;product_id&quot;: 28,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/39&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 46,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quas est fugiat&quot;,
                &quot;description&quot;: &quot;Occaecati repudiandae iusto possimus non. Consectetur nisi quidem magni modi ad vitae molestiae. Repellendus est ut ut.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1976-10-14&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 13,
                        &quot;name&quot;: &quot;pariatur rem exercitationem&quot;,
                        &quot;price&quot;: &quot;90.65&quot;,
                        &quot;stock&quot;: 13,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 46,
                            &quot;product_id&quot;: 13,
                            &quot;quantity&quot;: 3,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 20,
                        &quot;name&quot;: &quot;iure quasi molestiae&quot;,
                        &quot;price&quot;: &quot;57.57&quot;,
                        &quot;stock&quot;: 10,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 46,
                            &quot;product_id&quot;: 20,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 30,
                        &quot;name&quot;: &quot;quibusdam tempore culpa&quot;,
                        &quot;price&quot;: &quot;39.76&quot;,
                        &quot;stock&quot;: 5,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 46,
                            &quot;product_id&quot;: 30,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 32,
                        &quot;name&quot;: &quot;rerum doloribus voluptatem&quot;,
                        &quot;price&quot;: &quot;94.83&quot;,
                        &quot;stock&quot;: 20,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 46,
                            &quot;product_id&quot;: 32,
                            &quot;quantity&quot;: 6,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 44,
                        &quot;name&quot;: &quot;voluptas inventore non&quot;,
                        &quot;price&quot;: &quot;13.36&quot;,
                        &quot;stock&quot;: 6,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 46,
                            &quot;product_id&quot;: 44,
                            &quot;quantity&quot;: 3,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:58.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/46&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 53,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;autem consectetur ullam&quot;,
                &quot;description&quot;: &quot;Nemo tempore optio a modi. Nemo qui voluptate aut exercitationem fuga. Non aut vitae reiciendis aut qui ipsam aperiam reprehenderit. Deserunt pariatur similique quae molestiae praesentium ullam.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1987-12-23&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;quia corrupti aliquid&quot;,
                        &quot;price&quot;: &quot;58.70&quot;,
                        &quot;stock&quot;: 5,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 8,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 17,
                        &quot;name&quot;: &quot;ut eum odio&quot;,
                        &quot;price&quot;: &quot;11.36&quot;,
                        &quot;stock&quot;: 7,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 17,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 18,
                        &quot;name&quot;: &quot;veritatis ipsum amet&quot;,
                        &quot;price&quot;: &quot;30.10&quot;,
                        &quot;stock&quot;: 22,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 18,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 40,
                        &quot;name&quot;: &quot;quas hic veritatis&quot;,
                        &quot;price&quot;: &quot;92.55&quot;,
                        &quot;stock&quot;: 6,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 40,
                            &quot;quantity&quot;: 1,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 42,
                        &quot;name&quot;: &quot;et et et&quot;,
                        &quot;price&quot;: &quot;62.62&quot;,
                        &quot;stock&quot;: 17,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 42,
                            &quot;quantity&quot;: 1,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 44,
                        &quot;name&quot;: &quot;voluptas inventore non&quot;,
                        &quot;price&quot;: &quot;13.36&quot;,
                        &quot;stock&quot;: 6,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 44,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 46,
                        &quot;name&quot;: &quot;et quisquam eligendi&quot;,
                        &quot;price&quot;: &quot;30.14&quot;,
                        &quot;stock&quot;: 3,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:57.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 53,
                            &quot;product_id&quot;: 46,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:08:59.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/53&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 61,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;MacKenzie Blackwell&quot;,
                &quot;description&quot;: &quot;Laudantium ullamco&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1997-01-13&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;et praesentium nesciunt&quot;,
                        &quot;price&quot;: &quot;38.45&quot;,
                        &quot;stock&quot;: 4,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 61,
                            &quot;product_id&quot;: 4,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T21:18:21.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T21:18:21.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/61&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 62,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;Chelsea Rollins&quot;,
                &quot;description&quot;: &quot;Esse magna repudiand&quot;,
                &quot;status&quot;: &quot;P&quot;,
                &quot;date&quot;: &quot;2023-04-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 62,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 3,
                            &quot;created_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;et praesentium nesciunt&quot;,
                        &quot;price&quot;: &quot;38.45&quot;,
                        &quot;stock&quot;: 4,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 62,
                            &quot;product_id&quot;: 4,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 8,
                        &quot;name&quot;: &quot;quia corrupti aliquid&quot;,
                        &quot;price&quot;: &quot;58.70&quot;,
                        &quot;stock&quot;: 5,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 62,
                            &quot;product_id&quot;: 8,
                            &quot;quantity&quot;: 4,
                            &quot;created_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-24T22:26:08.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/62&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 68,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 68,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 7,
                            &quot;created_at&quot;: &quot;2025-02-26T20:18:13.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T20:18:13.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 68,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T20:18:13.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T20:18:13.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/68&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 69,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 69,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:36:18.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:36:18.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 69,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:36:18.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:36:18.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/69&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 70,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 70,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:37:44.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:37:44.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 70,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:37:44.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:37:44.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/70&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 71,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 71,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:37:47.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:37:47.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 71,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 5,
                            &quot;created_at&quot;: &quot;2025-02-26T22:37:47.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:37:47.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/71&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 72,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 72,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-26T22:51:25.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:51:25.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 72,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 1,
                            &quot;created_at&quot;: &quot;2025-02-26T22:51:25.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-26T22:51:25.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/72&quot;
            }
        },
        {
            &quot;type&quot;: &quot;order&quot;,
            &quot;id&quot;: 77,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;modi quo voluptas&quot;,
                &quot;description&quot;: &quot;Et dolorem natus ipsam soluta eveniet nihil. Soluta autem est atque in. Omnis velit iure expedita quo.&quot;,
                &quot;status&quot;: &quot;F&quot;,
                &quot;date&quot;: &quot;1995-05-01&quot;
            },
            &quot;relationships&quot;: {
                &quot;products&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                        &quot;price&quot;: &quot;98.17&quot;,
                        &quot;stock&quot;: 0,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 77,
                            &quot;product_id&quot;: 1,
                            &quot;quantity&quot;: 2,
                            &quot;created_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;sapiente est eum&quot;,
                        &quot;price&quot;: &quot;62.89&quot;,
                        &quot;stock&quot;: 1,
                        &quot;created_at&quot;: &quot;2025-02-24T21:08:56.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;order_id&quot;: 77,
                            &quot;product_id&quot;: 2,
                            &quot;quantity&quot;: 1,
                            &quot;created_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2025-02-27T00:30:28.000000Z&quot;
                        }
                    }
                ]
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders/77&quot;
            }
        }
    ],
    &quot;links&quot;: {
        &quot;self&quot;: &quot;http://localhost:2202/api/v1/orders&quot;
    },
    &quot;meta&quot;: {
        &quot;version&quot;: &quot;0.1.0&quot;,
        &quot;author&quot;: &quot;Diaa Mohammad&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders" data-method="GET"
      data-path="api/v1/orders"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders"
                    onclick="tryItOut('GETapi-v1-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders"
                    onclick="cancelTryOut('GETapi-v1-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-orders"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-orders--id-">Display the specified resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:2202/api/v1/orders/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/v1/orders/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-orders--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;errors&quot;: &quot;You are not authorized&quot;,
    &quot;status&quot;: 401
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-orders--id-" data-method="GET"
      data-path="api/v1/orders/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-orders--id-"
                    onclick="tryItOut('GETapi-v1-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-orders--id-"
                    onclick="cancelTryOut('GETapi-v1-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-orders--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-v1-orders--id-">Remove the specified resource from storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-v1-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:2202/api/v1/orders/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/v1/orders/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-v1-orders--id-">
</span>
<span id="execution-results-DELETEapi-v1-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-v1-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-v1-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-v1-orders--id-" data-method="DELETE"
      data-path="api/v1/orders/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-v1-orders--id-"
                    onclick="tryItOut('DELETEapi-v1-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-v1-orders--id-"
                    onclick="cancelTryOut('DELETEapi-v1-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-v1-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/v1/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="DELETEapi-v1-orders--id-"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-v1-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-v1-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-products">Display a listing of the resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-v1-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:2202/api/v1/products" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:2202/api/v1/products"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 1,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;ex sapiente beatae&quot;,
                &quot;price&quot;: &quot;98.17&quot;,
                &quot;stock&quot;: 0
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 2,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;sapiente est eum&quot;,
                &quot;price&quot;: &quot;62.89&quot;,
                &quot;stock&quot;: 1
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 3,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;autem doloremque iure&quot;,
                &quot;price&quot;: &quot;50.51&quot;,
                &quot;stock&quot;: 0
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 4,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;et praesentium nesciunt&quot;,
                &quot;price&quot;: &quot;38.45&quot;,
                &quot;stock&quot;: 4
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 5,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;sapiente non impedit&quot;,
                &quot;price&quot;: &quot;87.66&quot;,
                &quot;stock&quot;: 8
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 6,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;maxime dolores ut&quot;,
                &quot;price&quot;: &quot;9.03&quot;,
                &quot;stock&quot;: 6
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 7,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;ipsum commodi eos&quot;,
                &quot;price&quot;: &quot;53.81&quot;,
                &quot;stock&quot;: 10
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 8,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quia corrupti aliquid&quot;,
                &quot;price&quot;: &quot;58.70&quot;,
                &quot;stock&quot;: 5
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 9,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;corrupti cum distinctio&quot;,
                &quot;price&quot;: &quot;4.69&quot;,
                &quot;stock&quot;: 23
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 10,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;aperiam qui et&quot;,
                &quot;price&quot;: &quot;98.42&quot;,
                &quot;stock&quot;: 4
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 11,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;consequatur possimus aut&quot;,
                &quot;price&quot;: &quot;62.55&quot;,
                &quot;stock&quot;: 24
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 12,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;beatae qui corrupti&quot;,
                &quot;price&quot;: &quot;25.81&quot;,
                &quot;stock&quot;: 21
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 13,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;pariatur rem exercitationem&quot;,
                &quot;price&quot;: &quot;90.65&quot;,
                &quot;stock&quot;: 13
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 14,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;qui placeat molestiae&quot;,
                &quot;price&quot;: &quot;39.33&quot;,
                &quot;stock&quot;: 9
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 15,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;doloremque et quia&quot;,
                &quot;price&quot;: &quot;54.72&quot;,
                &quot;stock&quot;: 11
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 16,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;ea libero dolores&quot;,
                &quot;price&quot;: &quot;45.40&quot;,
                &quot;stock&quot;: 21
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 17,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;ut eum odio&quot;,
                &quot;price&quot;: &quot;11.36&quot;,
                &quot;stock&quot;: 7
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 18,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;veritatis ipsum amet&quot;,
                &quot;price&quot;: &quot;30.10&quot;,
                &quot;stock&quot;: 22
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 19,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;facere provident excepturi&quot;,
                &quot;price&quot;: &quot;72.15&quot;,
                &quot;stock&quot;: 9
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 20,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;iure quasi molestiae&quot;,
                &quot;price&quot;: &quot;57.57&quot;,
                &quot;stock&quot;: 10
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 21,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;et explicabo vel&quot;,
                &quot;price&quot;: &quot;94.20&quot;,
                &quot;stock&quot;: 22
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 22,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;nostrum ea aut&quot;,
                &quot;price&quot;: &quot;57.83&quot;,
                &quot;stock&quot;: 4
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 23,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;illum sunt consequatur&quot;,
                &quot;price&quot;: &quot;57.88&quot;,
                &quot;stock&quot;: 21
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 24,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;consequatur nobis sunt&quot;,
                &quot;price&quot;: &quot;6.45&quot;,
                &quot;stock&quot;: 9
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 25,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;qui ut sed&quot;,
                &quot;price&quot;: &quot;93.72&quot;,
                &quot;stock&quot;: 23
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 26,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;fugit ut cum&quot;,
                &quot;price&quot;: &quot;71.37&quot;,
                &quot;stock&quot;: 12
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 27,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;officia est ipsa&quot;,
                &quot;price&quot;: &quot;57.63&quot;,
                &quot;stock&quot;: 23
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 28,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;rem ut qui&quot;,
                &quot;price&quot;: &quot;28.15&quot;,
                &quot;stock&quot;: 13
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 29,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quis eligendi possimus&quot;,
                &quot;price&quot;: &quot;50.97&quot;,
                &quot;stock&quot;: 16
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 30,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quibusdam tempore culpa&quot;,
                &quot;price&quot;: &quot;39.76&quot;,
                &quot;stock&quot;: 5
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 31,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;deleniti natus iure&quot;,
                &quot;price&quot;: &quot;28.77&quot;,
                &quot;stock&quot;: 5
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 32,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;rerum doloribus voluptatem&quot;,
                &quot;price&quot;: &quot;94.83&quot;,
                &quot;stock&quot;: 20
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 33,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;voluptatum temporibus fuga&quot;,
                &quot;price&quot;: &quot;24.56&quot;,
                &quot;stock&quot;: 18
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 34,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;vero dolor nostrum&quot;,
                &quot;price&quot;: &quot;66.95&quot;,
                &quot;stock&quot;: 18
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 35,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;culpa aut aspernatur&quot;,
                &quot;price&quot;: &quot;31.71&quot;,
                &quot;stock&quot;: 20
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 36,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;voluptatem dolorem harum&quot;,
                &quot;price&quot;: &quot;58.27&quot;,
                &quot;stock&quot;: 14
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 37,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;unde vitae commodi&quot;,
                &quot;price&quot;: &quot;21.10&quot;,
                &quot;stock&quot;: 16
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 38,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;fugit quos neque&quot;,
                &quot;price&quot;: &quot;47.15&quot;,
                &quot;stock&quot;: 3
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 39,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quis ut dolore&quot;,
                &quot;price&quot;: &quot;13.13&quot;,
                &quot;stock&quot;: 6
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 40,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quas hic veritatis&quot;,
                &quot;price&quot;: &quot;92.55&quot;,
                &quot;stock&quot;: 6
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 41,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;aperiam occaecati aspernatur&quot;,
                &quot;price&quot;: &quot;3.05&quot;,
                &quot;stock&quot;: 15
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 42,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;et et et&quot;,
                &quot;price&quot;: &quot;62.62&quot;,
                &quot;stock&quot;: 17
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 43,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;omnis architecto enim&quot;,
                &quot;price&quot;: &quot;58.99&quot;,
                &quot;stock&quot;: 13
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 44,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;voluptas inventore non&quot;,
                &quot;price&quot;: &quot;13.36&quot;,
                &quot;stock&quot;: 6
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 45,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;corporis et aspernatur&quot;,
                &quot;price&quot;: &quot;34.51&quot;,
                &quot;stock&quot;: 16
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 46,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;et quisquam eligendi&quot;,
                &quot;price&quot;: &quot;30.14&quot;,
                &quot;stock&quot;: 3
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 47,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;qui quidem nemo&quot;,
                &quot;price&quot;: &quot;23.48&quot;,
                &quot;stock&quot;: 7
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 48,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;sint voluptates voluptas&quot;,
                &quot;price&quot;: &quot;52.47&quot;,
                &quot;stock&quot;: 9
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 49,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;quidem inventore fugit&quot;,
                &quot;price&quot;: &quot;52.27&quot;,
                &quot;stock&quot;: 8
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        },
        {
            &quot;type&quot;: &quot;product&quot;,
            &quot;id&quot;: 50,
            &quot;attributes&quot;: {
                &quot;name&quot;: &quot;et molestiae temporibus&quot;,
                &quot;price&quot;: &quot;89.57&quot;,
                &quot;stock&quot;: 4
            },
            &quot;links&quot;: {
                &quot;self&quot;: &quot;todo&quot;
            }
        }
    ],
    &quot;meta&quot;: {
        &quot;version&quot;: &quot;0.1.0&quot;,
        &quot;author&quot;: &quot;Diaa Mohammad&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-products" data-method="GET"
      data-path="api/v1/products"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-products"
                    onclick="tryItOut('GETapi-v1-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-products"
                    onclick="cancelTryOut('GETapi-v1-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Authorization</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Authorization" class="auth-value"               data-endpoint="GETapi-v1-products"
               value="Bearer {YOUR_AUTH_KEY}"
               data-component="header">
    <br>
<p>Example: <code>Bearer {YOUR_AUTH_KEY}</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>

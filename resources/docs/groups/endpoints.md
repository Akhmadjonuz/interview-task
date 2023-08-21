# Endpoints


## Return an empty response simply to trigger the storage of the CSRF cookie in the browser.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/sanctum/csrf-cookie" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/sanctum/csrf-cookie"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


<div id="execution-results-GETsanctum-csrf-cookie" hidden>
    <blockquote>Received response<span id="execution-response-status-GETsanctum-csrf-cookie"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETsanctum-csrf-cookie"></code></pre>
</div>
<div id="execution-error-GETsanctum-csrf-cookie" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsanctum-csrf-cookie"></code></pre>
</div>
<form id="form-GETsanctum-csrf-cookie" data-method="GET" data-path="sanctum/csrf-cookie" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETsanctum-csrf-cookie', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETsanctum-csrf-cookie" onclick="tryItOut('GETsanctum-csrf-cookie');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETsanctum-csrf-cookie" onclick="cancelTryOut('GETsanctum-csrf-cookie');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETsanctum-csrf-cookie" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>sanctum/csrf-cookie</code></b>
</p>
<p>
<label id="auth-GETsanctum-csrf-cookie" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETsanctum-csrf-cookie" data-component="header"></label>
</p>
</form>


## AUTH / Log in the user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/login" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"testuser@example.com","password":"secret"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/login"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "testuser@example.com",
    "password": "secret"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "name": "eyJ0eXA...",
    "email": "eyJ0eXA...",
    "role": "eyJ0eXA...",
    "token": "eyJ0eXA..."
}
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</div>
<div id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</div>
<form id="form-POSTapi-login" data-method="POST" data-path="api/login" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-login" onclick="tryItOut('POSTapi-login');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-login" onclick="cancelTryOut('POSTapi-login');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-login" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/login</code></b>
</p>
<p>
<label id="auth-POSTapi-login" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-login" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The email of the  user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-login" data-component="body" required  hidden>
<br>
The password of the  user.
</p>

</form>


## USERS / Get users (moderators / operators)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/api/user/get" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/api/user/get"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

{
 "name": "eyJ0eXA...",
 "email": "eyJ0eXA...",
 "role": "1|2",
 "state_id": "eyJ0eXA..." #if it's new moderator
 "moderator_id": "eyJ0eXA..." #if it's new operator
}
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (403, In code error):

```json
"in code error with simple text"
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-GETapi-user-get" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-user-get"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-get"></code></pre>
</div>
<div id="execution-error-GETapi-user-get" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-get"></code></pre>
</div>
<form id="form-GETapi-user-get" data-method="GET" data-path="api/user/get" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-user-get', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-user-get" onclick="tryItOut('GETapi-user-get');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-user-get" onclick="cancelTryOut('GETapi-user-get');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-user-get" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/user/get</code></b>
</p>
<p>
<label id="auth-GETapi-user-get" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-user-get" data-component="header"></label>
</p>
</form>


## USERS /  Register new user (operator / moderator)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/user/new" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"name","email":"testuser@example.com","password":"secret","role":8,"state_id":18,"password_confirmation":"secret"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/user/new"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "name",
    "email": "testuser@example.com",
    "password": "secret",
    "role": 8,
    "state_id": 18,
    "password_confirmation": "secret"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
 "name": "eyJ0eXA...",
 "email": "eyJ0eXA...",
 "role": "1|2",
 "state_id": "eyJ0eXA..." #if it's new moderator
 "moderator_id": "eyJ0eXA..." #if it's new operator
}
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-POSTapi-user-new" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-user-new"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-new"></code></pre>
</div>
<div id="execution-error-POSTapi-user-new" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-new"></code></pre>
</div>
<form id="form-POSTapi-user-new" data-method="POST" data-path="api/user/new" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-new', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-user-new" onclick="tryItOut('POSTapi-user-new');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-user-new" onclick="cancelTryOut('POSTapi-user-new');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-user-new" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/user/new</code></b>
</p>
<p>
<label id="auth-POSTapi-user-new" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-user-new" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-user-new" data-component="body" required  hidden>
<br>
The name of the  user.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-user-new" data-component="body" required  hidden>
<br>
The email of the  user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="POSTapi-user-new" data-component="body" required  hidden>
<br>
The password of the  user.
</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role" data-endpoint="POSTapi-user-new" data-component="body" required  hidden>
<br>
(2, 3)
</p>
<p>
<b><code>state_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="state_id" data-endpoint="POSTapi-user-new" data-component="body"  hidden>
<br>
State id (Namangan, Tashkent)
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="POSTapi-user-new" data-component="body" required  hidden>
<br>
The password of the  user.
</p>

</form>


## USERS /  Edit user (operator / moderator)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PUT \
    "http://192.168.0.108/api/user/edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"name","name":"name","email":"testuser@example.com","password":"secret","role":10,"state_id":13,"password_confirmation":"secret"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/user/edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "name",
    "name": "name",
    "email": "testuser@example.com",
    "password": "secret",
    "role": 10,
    "state_id": 13,
    "password_confirmation": "secret"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json

{
 "name": "eyJ0eXA...",
 "email": "eyJ0eXA...",
 "role": "1|2",
 "state_id": "eyJ0eXA..." #if it's new moderator
 "moderator_id": "eyJ0eXA..." #if it's new operator
}
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-PUTapi-user-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-user-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-user-edit"></code></pre>
</div>
<div id="execution-error-PUTapi-user-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-user-edit"></code></pre>
</div>
<form id="form-PUTapi-user-edit" data-method="PUT" data-path="api/user/edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-user-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PUTapi-user-edit" onclick="tryItOut('PUTapi-user-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PUTapi-user-edit" onclick="cancelTryOut('PUTapi-user-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PUTapi-user-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/user/edit</code></b>
</p>
<p>
<label id="auth-PUTapi-user-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-user-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
The id of the  user.
</p>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
The name of the  user.
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
The email of the  user.
</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
The password of the  user.
</p>
<p>
<b><code>role</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="role" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
(2, 3)
</p>
<p>
<b><code>state_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="state_id" data-endpoint="PUTapi-user-edit" data-component="body"  hidden>
<br>
State id (Namangan, Tashkent)
</p>
<p>
<b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="password" name="password_confirmation" data-endpoint="PUTapi-user-edit" data-component="body" required  hidden>
<br>
The password of the  user.
</p>

</form>


## USERS /  Delete user (operator / moderator)

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.108/api/user/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":"name"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/user/delete"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": "name"
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "message": "success"
}
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-DELETEapi-user-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-user-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-user-delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-user-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-user-delete"></code></pre>
</div>
<form id="form-DELETEapi-user-delete" data-method="DELETE" data-path="api/user/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-user-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-user-delete" onclick="tryItOut('DELETEapi-user-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-user-delete" onclick="cancelTryOut('DELETEapi-user-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-user-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/user/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-user-delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-user-delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="id" data-endpoint="DELETEapi-user-delete" data-component="body" required  hidden>
<br>
The id of the  user.
</p>

</form>


## LOCATIONS / Get states with regions

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/api/locations/get" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/get"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-GETapi-locations-get" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-locations-get"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-locations-get"></code></pre>
</div>
<div id="execution-error-GETapi-locations-get" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-locations-get"></code></pre>
</div>
<form id="form-GETapi-locations-get" data-method="GET" data-path="api/locations/get" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-locations-get', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-locations-get" onclick="tryItOut('GETapi-locations-get');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-locations-get" onclick="cancelTryOut('GETapi-locations-get');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-locations-get" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/locations/get</code></b>
</p>
<p>
<label id="auth-GETapi-locations-get" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-locations-get" data-component="header"></label>
</p>
</form>


## LOCATIONS / Create state

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/locations/states/new" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name_kr":"neque","name_ru":"sit","name_oz":"qui","channel_id":1}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/states/new"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name_kr": "neque",
    "name_ru": "sit",
    "name_oz": "qui",
    "channel_id": 1
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-POSTapi-locations-states-new" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-locations-states-new"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-locations-states-new"></code></pre>
</div>
<div id="execution-error-POSTapi-locations-states-new" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-locations-states-new"></code></pre>
</div>
<form id="form-POSTapi-locations-states-new" data-method="POST" data-path="api/locations/states/new" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-locations-states-new', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-locations-states-new" onclick="tryItOut('POSTapi-locations-states-new');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-locations-states-new" onclick="cancelTryOut('POSTapi-locations-states-new');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-locations-states-new" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/locations/states/new</code></b>
</p>
<p>
<label id="auth-POSTapi-locations-states-new" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-locations-states-new" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_kr" data-endpoint="POSTapi-locations-states-new" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_ru" data-endpoint="POSTapi-locations-states-new" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_oz" data-endpoint="POSTapi-locations-states-new" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>channel_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="channel_id" data-endpoint="POSTapi-locations-states-new" data-component="body"  hidden>
<br>
The telegram channel name
</p>

</form>


## LOCATIONS / Edit state

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.108/api/locations/states/edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":4,"name_kr":"eum","name_ru":"occaecati","name_oz":"dolorem","channel_id":12}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/states/edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 4,
    "name_kr": "eum",
    "name_ru": "occaecati",
    "name_oz": "dolorem",
    "channel_id": 12
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-PATCHapi-locations-states-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-locations-states-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-locations-states-edit"></code></pre>
</div>
<div id="execution-error-PATCHapi-locations-states-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-locations-states-edit"></code></pre>
</div>
<form id="form-PATCHapi-locations-states-edit" data-method="PATCH" data-path="api/locations/states/edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-locations-states-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-locations-states-edit" onclick="tryItOut('PATCHapi-locations-states-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-locations-states-edit" onclick="cancelTryOut('PATCHapi-locations-states-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-locations-states-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/locations/states/edit</code></b>
</p>
<p>
<label id="auth-PATCHapi-locations-states-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-locations-states-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-locations-states-edit" data-component="body" required  hidden>
<br>
The id of state
</p>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_kr" data-endpoint="PATCHapi-locations-states-edit" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_ru" data-endpoint="PATCHapi-locations-states-edit" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_oz" data-endpoint="PATCHapi-locations-states-edit" data-component="body" required  hidden>
<br>
The name of state
</p>
<p>
<b><code>channel_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="channel_id" data-endpoint="PATCHapi-locations-states-edit" data-component="body"  hidden>
<br>
The telegram channel name
</p>

</form>


## LOCATIONS / Remove state

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.108/api/locations/states/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":7}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/states/delete"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 7
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-DELETEapi-locations-states-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-locations-states-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-locations-states-delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-locations-states-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-locations-states-delete"></code></pre>
</div>
<form id="form-DELETEapi-locations-states-delete" data-method="DELETE" data-path="api/locations/states/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-locations-states-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-locations-states-delete" onclick="tryItOut('DELETEapi-locations-states-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-locations-states-delete" onclick="cancelTryOut('DELETEapi-locations-states-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-locations-states-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/locations/states/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-locations-states-delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-locations-states-delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-locations-states-delete" data-component="body" required  hidden>
<br>
The id of deleted state.
</p>

</form>


## LOCATIONS / Create region

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/locations/regions/new" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name_kr":18,"name_ru":17,"name_oz":5,"state_id":6}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/regions/new"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name_kr": 18,
    "name_ru": 17,
    "name_oz": 5,
    "state_id": 6
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-POSTapi-locations-regions-new" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-locations-regions-new"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-locations-regions-new"></code></pre>
</div>
<div id="execution-error-POSTapi-locations-regions-new" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-locations-regions-new"></code></pre>
</div>
<form id="form-POSTapi-locations-regions-new" data-method="POST" data-path="api/locations/regions/new" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-locations-regions-new', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-locations-regions-new" onclick="tryItOut('POSTapi-locations-regions-new');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-locations-regions-new" onclick="cancelTryOut('POSTapi-locations-regions-new');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-locations-regions-new" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/locations/regions/new</code></b>
</p>
<p>
<label id="auth-POSTapi-locations-regions-new" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-locations-regions-new" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_kr" data-endpoint="POSTapi-locations-regions-new" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_ru" data-endpoint="POSTapi-locations-regions-new" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_oz" data-endpoint="POSTapi-locations-regions-new" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>state_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="state_id" data-endpoint="POSTapi-locations-regions-new" data-component="body" required  hidden>
<br>
The id of state
</p>

</form>


## LOCATIONS / Edit region

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.108/api/locations/regions/edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":3,"name_kr":10,"name_oz":20,"name_ru":5,"state_id":16}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/regions/edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 3,
    "name_kr": 10,
    "name_oz": 20,
    "name_ru": 5,
    "state_id": 16
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-PATCHapi-locations-regions-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-locations-regions-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-locations-regions-edit"></code></pre>
</div>
<div id="execution-error-PATCHapi-locations-regions-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-locations-regions-edit"></code></pre>
</div>
<form id="form-PATCHapi-locations-regions-edit" data-method="PATCH" data-path="api/locations/regions/edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-locations-regions-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-locations-regions-edit" onclick="tryItOut('PATCHapi-locations-regions-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-locations-regions-edit" onclick="cancelTryOut('PATCHapi-locations-regions-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-locations-regions-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/locations/regions/edit</code></b>
</p>
<p>
<label id="auth-PATCHapi-locations-regions-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-locations-regions-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-locations-regions-edit" data-component="body" required  hidden>
<br>
The id of region
</p>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_kr" data-endpoint="PATCHapi-locations-regions-edit" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_oz" data-endpoint="PATCHapi-locations-regions-edit" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="name_ru" data-endpoint="PATCHapi-locations-regions-edit" data-component="body" required  hidden>
<br>
The name of region
</p>
<p>
<b><code>state_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
<input type="number" name="state_id" data-endpoint="PATCHapi-locations-regions-edit" data-component="body"  hidden>
<br>
The id of state
</p>

</form>


## LOCATIONS / Remove region

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.108/api/locations/regions/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":4}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/locations/regions/delete"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 4
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[
 {
   "id": "1",
   "name": "Tashkent",
   "channel_id": "53475948",
   "regions": [
     {
       "id": "51",
       "name": "Tashkor",
       "state_id": "1",
     }, ...
   ]
 }, ...
]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-DELETEapi-locations-regions-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-locations-regions-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-locations-regions-delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-locations-regions-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-locations-regions-delete"></code></pre>
</div>
<form id="form-DELETEapi-locations-regions-delete" data-method="DELETE" data-path="api/locations/regions/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-locations-regions-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-locations-regions-delete" onclick="tryItOut('DELETEapi-locations-regions-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-locations-regions-delete" onclick="cancelTryOut('DELETEapi-locations-regions-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-locations-regions-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/locations/regions/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-locations-regions-delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-locations-regions-delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-locations-regions-delete" data-component="body" required  hidden>
<br>
The id of deleted region.
</p>

</form>


## OCCUPATIONS / Get occupations

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/api/occupations/get" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/api/occupations/get"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name_kr": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-GETapi-occupations-get" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-occupations-get"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-occupations-get"></code></pre>
</div>
<div id="execution-error-GETapi-occupations-get" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-occupations-get"></code></pre>
</div>
<form id="form-GETapi-occupations-get" data-method="GET" data-path="api/occupations/get" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-occupations-get', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-occupations-get" onclick="tryItOut('GETapi-occupations-get');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-occupations-get" onclick="cancelTryOut('GETapi-occupations-get');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-occupations-get" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/occupations/get</code></b>
</p>
<p>
<label id="auth-GETapi-occupations-get" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-occupations-get" data-component="header"></label>
</p>
</form>


## OCCUPATIONS / Create occupation

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/occupations/new" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name_kr":"et","name_ru":"molestias","name_oz":"cumque"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/occupations/new"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name_kr": "et",
    "name_ru": "molestias",
    "name_oz": "cumque"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-POSTapi-occupations-new" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-occupations-new"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-occupations-new"></code></pre>
</div>
<div id="execution-error-POSTapi-occupations-new" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-occupations-new"></code></pre>
</div>
<form id="form-POSTapi-occupations-new" data-method="POST" data-path="api/occupations/new" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-occupations-new', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-occupations-new" onclick="tryItOut('POSTapi-occupations-new');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-occupations-new" onclick="cancelTryOut('POSTapi-occupations-new');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-occupations-new" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/occupations/new</code></b>
</p>
<p>
<label id="auth-POSTapi-occupations-new" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-occupations-new" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_kr" data-endpoint="POSTapi-occupations-new" data-component="body" required  hidden>
<br>
The name of occupation
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_ru" data-endpoint="POSTapi-occupations-new" data-component="body" required  hidden>
<br>
The name of occupation
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_oz" data-endpoint="POSTapi-occupations-new" data-component="body" required  hidden>
<br>
The name of occupation
</p>

</form>


## OCCUPATIONS / Edit occupation

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.108/api/occupations/edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":19,"name_kr":"quam","name_ru":"ab","name_oz":"sed"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/occupations/edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 19,
    "name_kr": "quam",
    "name_ru": "ab",
    "name_oz": "sed"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-PATCHapi-occupations-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-occupations-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-occupations-edit"></code></pre>
</div>
<div id="execution-error-PATCHapi-occupations-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-occupations-edit"></code></pre>
</div>
<form id="form-PATCHapi-occupations-edit" data-method="PATCH" data-path="api/occupations/edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-occupations-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-occupations-edit" onclick="tryItOut('PATCHapi-occupations-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-occupations-edit" onclick="cancelTryOut('PATCHapi-occupations-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-occupations-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/occupations/edit</code></b>
</p>
<p>
<label id="auth-PATCHapi-occupations-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-occupations-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-occupations-edit" data-component="body" required  hidden>
<br>
The id of occupation
</p>
<p>
<b><code>name_kr</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_kr" data-endpoint="PATCHapi-occupations-edit" data-component="body" required  hidden>
<br>
The name of occupation
</p>
<p>
<b><code>name_ru</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_ru" data-endpoint="PATCHapi-occupations-edit" data-component="body" required  hidden>
<br>
The name of occupation
</p>
<p>
<b><code>name_oz</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name_oz" data-endpoint="PATCHapi-occupations-edit" data-component="body" required  hidden>
<br>
The name of occupation
</p>

</form>


## OCCUPATIONS / Delete occupation

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X DELETE \
    "http://192.168.0.108/api/occupations/delete" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":4}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/occupations/delete"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 4
}

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (422, LaraBuildIn Error):

```json
{
    "message": "Overall message error",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    }
}
```
> Example response (401, In code error):

```json
"in code error with simple text"
```
> Example response (403, Access error code):

```json
"You can't access this method"
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-DELETEapi-occupations-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-occupations-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-occupations-delete"></code></pre>
</div>
<div id="execution-error-DELETEapi-occupations-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-occupations-delete"></code></pre>
</div>
<form id="form-DELETEapi-occupations-delete" data-method="DELETE" data-path="api/occupations/delete" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-occupations-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-DELETEapi-occupations-delete" onclick="tryItOut('DELETEapi-occupations-delete');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-DELETEapi-occupations-delete" onclick="cancelTryOut('DELETEapi-occupations-delete');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-DELETEapi-occupations-delete" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/occupations/delete</code></b>
</p>
<p>
<label id="auth-DELETEapi-occupations-delete" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-occupations-delete" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="DELETEapi-occupations-delete" data-component="body" required  hidden>
<br>
The id of occupation
</p>

</form>


## SETTINGS / Get setting by id or all

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/api/settings/getvoluptate" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/api/settings/getvoluptate"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-GETapi-settings-get-id--" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-settings-get-id--"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-settings-get-id--"></code></pre>
</div>
<div id="execution-error-GETapi-settings-get-id--" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-settings-get-id--"></code></pre>
</div>
<form id="form-GETapi-settings-get-id--" data-method="GET" data-path="api/settings/get{id?}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-settings-get-id--', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GETapi-settings-get-id--" onclick="tryItOut('GETapi-settings-get-id--');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GETapi-settings-get-id--" onclick="cancelTryOut('GETapi-settings-get-id--');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GETapi-settings-get-id--" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/settings/get{id?}</code></b>
</p>
<p>
<label id="auth-GETapi-settings-get-id--" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-settings-get-id--" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="id" data-endpoint="GETapi-settings-get-id--" data-component="url"  hidden>
<br>

</p>
</form>


## SETTINGS / Edit setting by id

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X PATCH \
    "http://192.168.0.108/api/settings/edit" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"id":10,"value":"optio"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/settings/edit"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 10,
    "value": "optio"
}

fetch(url, {
    method: "PATCH",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, success):

```json

[{ "id": "1", "name": "Tashkent", "name_ru": "TashRu", "name_oz": "TashOz" }, {...}]
```
> Example response (500, Server error):

```json
"in code error with simple text"
```
<div id="execution-results-PATCHapi-settings-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-PATCHapi-settings-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-settings-edit"></code></pre>
</div>
<div id="execution-error-PATCHapi-settings-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-settings-edit"></code></pre>
</div>
<form id="form-PATCHapi-settings-edit" data-method="PATCH" data-path="api/settings/edit" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PATCHapi-settings-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-PATCHapi-settings-edit" onclick="tryItOut('PATCHapi-settings-edit');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-PATCHapi-settings-edit" onclick="cancelTryOut('PATCHapi-settings-edit');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-PATCHapi-settings-edit" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/settings/edit</code></b>
</p>
<p>
<label id="auth-PATCHapi-settings-edit" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PATCHapi-settings-edit" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="PATCHapi-settings-edit" data-component="body" required  hidden>
<br>

</p>
<p>
<b><code>value</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="value" data-endpoint="PATCHapi-settings-edit" data-component="body" required  hidden>
<br>

</p>

</form>


## AUTH /  Log out the user.

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X POST \
    "http://192.168.0.108/api/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"bearerToken":"secret"}'

```

```javascript
const url = new URL(
    "http://192.168.0.108/api/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "bearerToken": "secret"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200):

```json
{
    "name": "eyJ0eXA...",
    "email": "eyJ0eXA...",
    "role": "eyJ0eXA...",
    "token": "eyJ0eXA..."
}
```
<div id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</div>
<div id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</div>
<form id="form-POSTapi-logout" data-method="POST" data-path="api/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-POSTapi-logout" onclick="tryItOut('POSTapi-logout');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-POSTapi-logout" onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/logout</code></b>
</p>
<p>
<label id="auth-POSTapi-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-logout" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>bearerToken</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="bearerToken" data-endpoint="POSTapi-logout" data-component="body" required  hidden>
<br>
The bearerToken of the  user.
</p>

</form>


## /

<small class="badge badge-darkred">requires authentication</small>



> Example request:

```bash
curl -X GET \
    -G "http://192.168.0.108/" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://192.168.0.108/"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v8.83.27 (PHP v7.3.30)
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
        <button type="button" style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-tryout-GET-" onclick="tryItOut('GET-');">Try it out ⚡</button>
    <button type="button" style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-canceltryout-GET-" onclick="cancelTryOut('GET-');" hidden>Cancel</button>&nbsp;&nbsp;
    <button type="submit" style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;" id="btn-executetryout-GET-" hidden>Send Request 💥</button>
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
<p>
<label id="auth-GET-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GET-" data-component="header"></label>
</p>
</form>




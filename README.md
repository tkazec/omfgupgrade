A fun little site to point outdated users in the right direction based on their user agent. Now with more API!

---

**Basic usage**  
Send the unlucky recipients of your rage to http://omfgupgrade.net.

**Preview**  
See what it looks like with a specific status, without changing your UA! Add the `status` parameter (see the API for more info):

```
http://omfgupgrade.net?status=<old|cur|pre|mob|wtf>
```

**API**  
Send a request to http://omfgupgrade.net/api.json and it'll return info based on the request UA. If you need to use JSONP, just add the `callback` parameter. The response will be an object with the following data:

* `name`: Browser name.
* `version`: Browser version, a number in the format `<major>.<minor>` (note: the minor version may be 0 and therefore nonexistent).
* `status`: One of the following:
	* `old`: Outdated.
	* `cur`: Current.
	* `pre`: Prerelease.
	* `mob`: A mobile UA. `name` and `version` will be `null`.
	* `wtf`: An unparsable UA. `name` and `version` will be `null`.

---

>Copyright (c) 2012 Teddy Cross

>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
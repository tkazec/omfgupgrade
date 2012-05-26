A fun little site to point outdated browser users in the right direction based on their user agent. Now with more API! http://omfgupgrade.net

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

© 2012 [Teddy Cross](http://tkaz.ec), shared under the [MIT](http://www.opensource.org/licenses/MIT).
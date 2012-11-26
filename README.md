One of my fav service on my [Etisalat] (http://etisalat.com.ng/) is the missed call notification. I have even tried building a [service around it] (http://opeyemi.posterous.com/two-side-project-ideas) but didn't see it through. Since it seems the service has been stopped, I decided to build one for myself. So here it is and how you set it up.

1. Find a host, upload the files and setup the db (see the sql and config file).
2. Sign up at [Tropo] (http://tropo.com) to get a free developer account.
3. [At tropo] Create a new application. Name it whatever you want. Choose Web API as type. Use the url to the call-picker.php file (you uploaded) as the "url that powers your app". e.g http://some-domain.com/who-called/call-picker.php.
4. Add a number to your application. It's free. Choose whatever you want.
5. On your phone, redirect your call when busy (or unavailable or whatever) to the number added to your application. Dont forget that this should be in international format e.g +13342333333 or 00913342333333 (some device don't allow forwarding to number prefixed with +). On my android, this is available via Settings -> Call Settings -> Call Forwarding. On my Nokia, Settings -> Call -> Call divert.

That's pretty it. The index page includes a sample code to display your missed calls for the day. Customize as you wish.
This only works on Etisalat at the moment. MTN and Airtel do not support forwarding calls to an international number. Yet to test on Glo though.

The code is kinda crude at the mo. I hope to find time to make it better.
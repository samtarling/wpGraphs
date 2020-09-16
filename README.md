# wpGraphs
Does API queries against https://en.wikipedia.org, updates a database with counts of _things_ and shows pretty graphs

## Background
Aaaages ago I had a neat little cron job thing which made an API call to `/w/api.php?action=query&format=json&prop=categoryinfo&pageids={category_page_id}` and stored the `pages` count in a MySQL database. A PHP wotsit then took that data and spat out a graph.

I completely forgot about the hosting that was stored on and forgot to pay for it. Ooops.

## Things it counts
 * Pending AfC Submissions
 
## TODO
 * Finish the `WikiApi` class
 * Finish the `WikiLogIt` class

## Deep Dive
Let's take a look at what's going on behind the scenes - we'll query the number of pages in the Category "Pending AfC Submissions" (page ID of 23148779):
#### An API call is made to `/w/api.php?action=query&format=json&prop=categoryinfo&pageids=23148779`

#### The JSON response is parsed
```json
{
    "batchcomplete": "",
    "query": {
        "pages": {
            "23148779": {
                "pageid": 23148779,
                "ns": 14,
                "title": "Category:Pending AfC submissions",
                "categoryinfo": {
                    "size": 3470,
                    "pages": 3463,
                    "files": 0,
                    "subcats": 7
                }
            }
        }
    }
}
```

#### The `pages` count (3463) is inserted into a MySQL database

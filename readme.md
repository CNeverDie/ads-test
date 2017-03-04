##Requirements
* PHP: >= 7.0
* Composer: >= 1.0

##Installation
 * Clone repository from git
 * Run `composer install`

##Run

### From console
`php cli.php {adID} {source} {enableLoging} {responseFormat}`
    
### From web server
* Setup web server root into `./web` directory 
* Run query with params `?id={adID}&from={source}&log={log}&response_type={responseType}`

## Query params
* adID: 
    * integer
    * optional, default: `1`
* source:
    * string 
    * variants `mysql`/`daemon`, case insensitive 
    * optional, default: `mysql`
* log: 
    * bool
    * variants `Any value that can be cast to the bool` 
    * optional, default: `false`
* responseType: 
    * string
    * variants `html`/`json`
    * optional, default: `html`

##Remarks
* As an external independent logger used [Monolog](https://github.com/Seldaek/monolog)
* Info about the test task can read in [task.md](task.md) (RU)
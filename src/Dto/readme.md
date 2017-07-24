## JsonMapper PHP Doc
| RiotAPI Type               | PHPDoc                   |                |
|----------------------------|--------------------------|----------------|
| Map[string, `anything`]    | array                    | 원래는 `anything`[] 으로 하면 되지만, Key 에 '-', '_', ' ' 등이 포함되어 있을 경우 자동 탈락되는 문제가 발생한다.
| Map[int, `anything`]       | array                    |
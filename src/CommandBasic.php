<?php
/**
 * @link http://fuel.rocketroute.com/
 * @copyright (c) 2017 RocketRoute Ltd
 */

namespace RocketRoute\EnvUpdater;

/**
 * CommandBasic
 *
 * @author Andrii Fedchuk <andriy.fedchuk@rocketroute.com>
 */
class CommandBasic
{
    /**
     * The destination path
     *
     * @var string
     */
    private $destination;

    /**
     * The source path
     *
     * @var string
     */
    private $source;

    /**
     * Constructs an object.
     *
     * @param array $args  The arguments passed to command line.
     */
    public function __construct($args)
    {
        if ($args) {

            // The first argument is the command.
            array_shift($args);
            if(count($args) < 2) {
                fwrite(STDOUT, "\nIncorrect number of arguments, please see next command format: \n{php} run.php {source} {destination}\n");
                exit;
            }

            // getting files path
            list($this->source, $this->destination) = $args;
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      
        fwrite(STDOUT, "\n" . str_repeat('-', 40) . "\n");

        $sync = new EnvSyncService();
        $diffs = $sync->getDiff($this->source, $this->destination);
        if (count($diffs) > 0) {
            fwrite(STDOUT, sprintf("The following variables have been added to \"%s\":", basename($this->destination)));
            foreach ($diffs as $key => $diff) {
                fwrite(STDOUT, sprintf("\n\t- %s = %s", $key, (!is_array($diff) ? $diff : $diff['name'])));
                $sync->append($this->destination, $key, $diff);
            }
        } else {
            fwrite(STDOUT, sprintf("Your \"%s\" file is already synced with \"%s\"", basename($this->destination), basename($this->source)));
            return false;
        }

        fwrite(STDOUT, "\n" . str_repeat('-', 40) . "\n");
    }
}

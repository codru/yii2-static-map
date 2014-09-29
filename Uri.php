<?php
/**
 * Codru Components
 *
 * @author Maxim Vasiliev <codrilla@gmail.com>
 * @license http://www.opensource.org/licenses/bsd-license.php
 */

namespace codru\staticmap;


class Uri {
    private $generatingUriStrategy;
    private $mapOptions;

    public function __construct (GeneratingUriStrategy $generatingUriStrategy, array $mapOptions)
    {
        $this->generatingUriStrategy = $generatingUriStrategy;
        $this->mapOptions = $mapOptions;
    }

    public function generate()
    {
        return $this->generatingUriStrategy->generate($this->mapOptions);
    }
} 

<?php

/**
 * PHPExcel_WorksheetIterator
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 */
class PHPExcel_WorksheetIterator implements Iterator
{
    /**
     * Spreadsheet to iterate
     *
     * @var PHPExcel
     */
    private PHPExcel $subject;

    /**
     * Current iterator position
     *
     * @var int
     */
    private int $position = 0;

    /**
     * Create a new worksheet iterator
     *
     * @param PHPExcel $subject
     */
    public function __construct(PHPExcel $subject)
    {
        // Set subject
        $this->subject = $subject;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        unset($this->subject);
    }

    /**
     * Rewind iterator
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * Current PHPExcel_Worksheet
     *
     * @return PHPExcel_Worksheet
     */
    public function current(): PHPExcel_Worksheet
    {
        return $this->subject->getSheet($this->position);
    }

    /**
     * Current key
     *
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Next value
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * More PHPExcel_Worksheet instances available?
     *
     * @return bool
     */
    public function valid(): bool
    {
        return $this->position < $this->subject->getSheetCount();
    }
}

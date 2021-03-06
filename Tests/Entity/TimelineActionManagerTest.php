<?php

namespace Highco\TimelineBundle\Tests\Entity;

/**
 * TimelineActionManagerTest
 *
 * @author Stephane PY <py.stephane1@gmail.com>
 */
class TimelineActionManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * testUpdate
     */
    public function testUpdate()
    {
        $em = $this->getMock('Doctrine\Common\Persistence\ObjectManager');
        $ta = $this->getMock('Highco\TimelineBundle\Model\TimelineAction');

        $em->expects($this->once())
            ->method('persist')
            ->with($this->equalTo($ta));

        $em->expects($this->once())
            ->method('flush');

        $manager = new \Highco\TimelineBundle\Entity\TimelineActionManager($em);
        $manager->updateTimelineAction($ta);
    }

    /**
     * testGetTimelineActionsForIds
     */
    public function testGetTimelineActionsForIds()
    {
        $ids = array();

        $em = $this->getMock('Doctrine\Common\Persistence\ObjectManager');

        $manager = new \Highco\TimelineBundle\Entity\TimelineActionManager($em);
        $results = $manager->getTimelineActionsForIds($ids);
        $this->assertEquals($ids, array());
    }
}

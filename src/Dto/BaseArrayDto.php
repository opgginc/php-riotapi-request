<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 11:33
	 */

	namespace RiotQuest\Dto;

	/**
	 * - 단순 배열 (List) 를 Class 로 다뤄야할 때 사용함. (Collection Design Pattern 처럼)
	 * - champion -> spell -> effect 같은 2중 Array 구조일 떄 사용함. (사용 방법은 해당 클래스를 참조하시기 바랍니다)
	 *
	 * Class BaseArrayDto
	 * @package RiotQuest\Dto
	 */
	class BaseArrayDto extends \ArrayObject implements \JsonSerializable
	{

		/**
		 * @return array|null
		 */
		public function first() {
			foreach ($this as $key => $value) {
				return $value;
			}

			return null;
		}

		/**
		 * @return array|null
		 */
		public function last() {
			$a = array_reverse($this->getArrayCopy());

			foreach ($a as $key => $value) {
				return $value;
			}

			return null;
		}

		/**
		 * Specify data which should be serialized to JSON
		 * @link  http://php.net/manual/en/jsonserializable.jsonserialize.php
		 * @return mixed data which can be serialized by <b>json_encode</b>,
		 * which is a value of any type other than a resource.
		 * @since 5.4.0
		 */
		function jsonSerialize() {
			// ["a"] 이 되어야 될 것이 {"0": "a"} 가 되는 현상 해결
			// https://stackoverflow.com/questions/2716535/json-encode-behaving-different-on-arrayobject-vs-array
			return $this->getArrayCopy();
		}

		/**
		 * @return array
		 */
		public function toArray() {
			return json_decode(json_encode($this), true);
		}

		public function set0($data) {
			$this->offsetSet(0, $data);
		}

		public function set1($data) {
			$this->offsetSet(1, $data);
		}

		public function set2($data) {
			$this->offsetSet(2, $data);
		}

		public function set3($data) {
			$this->offsetSet(3, $data);
		}

		public function set4($data) {
			$this->offsetSet(4, $data);
		}

		public function set5($data) {
			$this->offsetSet(5, $data);
		}

		public function set6($data) {
			$this->offsetSet(6, $data);
		}

		public function set7($data) {
			$this->offsetSet(7, $data);
		}

		public function set8($data) {
			$this->offsetSet(8, $data);
		}

		public function set9($data) {
			$this->offsetSet(9, $data);
		}

		public function set10($data) {
			$this->offsetSet(10, $data);
		}

		public function set11($data) {
			$this->offsetSet(11, $data);
		}

		public function set12($data) {
			$this->offsetSet(12, $data);
		}

		public function set13($data) {
			$this->offsetSet(13, $data);
		}

		public function set14($data) {
			$this->offsetSet(14, $data);
		}

		public function set15($data) {
			$this->offsetSet(15, $data);
		}

		public function set16($data) {
			$this->offsetSet(16, $data);
		}

		public function set17($data) {
			$this->offsetSet(17, $data);
		}

		public function set18($data) {
			$this->offsetSet(18, $data);
		}

		public function set19($data) {
			$this->offsetSet(19, $data);
		}

		public function set20($data) {
			$this->offsetSet(20, $data);
		}

		public function set21($data) {
			$this->offsetSet(21, $data);
		}

		public function set22($data) {
			$this->offsetSet(22, $data);
		}

		public function set23($data) {
			$this->offsetSet(23, $data);
		}

		public function set24($data) {
			$this->offsetSet(24, $data);
		}

		public function set25($data) {
			$this->offsetSet(25, $data);
		}

		public function set26($data) {
			$this->offsetSet(26, $data);
		}

		public function set27($data) {
			$this->offsetSet(27, $data);
		}

		public function set28($data) {
			$this->offsetSet(28, $data);
		}

		public function set29($data) {
			$this->offsetSet(29, $data);
		}

		public function set30($data) {
			$this->offsetSet(30, $data);
		}

		public function set31($data) {
			$this->offsetSet(31, $data);
		}

		public function set32($data) {
			$this->offsetSet(32, $data);
		}

		public function set33($data) {
			$this->offsetSet(33, $data);
		}

		public function set34($data) {
			$this->offsetSet(34, $data);
		}

		public function set35($data) {
			$this->offsetSet(35, $data);
		}

		public function set36($data) {
			$this->offsetSet(36, $data);
		}

		public function set37($data) {
			$this->offsetSet(37, $data);
		}

		public function set38($data) {
			$this->offsetSet(38, $data);
		}

		public function set39($data) {
			$this->offsetSet(39, $data);
		}

		public function set40($data) {
			$this->offsetSet(40, $data);
		}

		public function set41($data) {
			$this->offsetSet(41, $data);
		}

		public function set42($data) {
			$this->offsetSet(42, $data);
		}

		public function set43($data) {
			$this->offsetSet(43, $data);
		}

		public function set44($data) {
			$this->offsetSet(44, $data);
		}

		public function set45($data) {
			$this->offsetSet(45, $data);
		}

		public function set46($data) {
			$this->offsetSet(46, $data);
		}

		public function set47($data) {
			$this->offsetSet(47, $data);
		}

		public function set48($data) {
			$this->offsetSet(48, $data);
		}

		public function set49($data) {
			$this->offsetSet(49, $data);
		}

		public function set50($data) {
			$this->offsetSet(50, $data);
		}

		public function set51($data) {
			$this->offsetSet(51, $data);
		}

		public function set52($data) {
			$this->offsetSet(52, $data);
		}

		public function set53($data) {
			$this->offsetSet(53, $data);
		}

		public function set54($data) {
			$this->offsetSet(54, $data);
		}

		public function set55($data) {
			$this->offsetSet(55, $data);
		}

		public function set56($data) {
			$this->offsetSet(56, $data);
		}

		public function set57($data) {
			$this->offsetSet(57, $data);
		}

		public function set58($data) {
			$this->offsetSet(58, $data);
		}

		public function set59($data) {
			$this->offsetSet(59, $data);
		}

		public function set60($data) {
			$this->offsetSet(60, $data);
		}

		public function set61($data) {
			$this->offsetSet(61, $data);
		}

		public function set62($data) {
			$this->offsetSet(62, $data);
		}

		public function set63($data) {
			$this->offsetSet(63, $data);
		}

		public function set64($data) {
			$this->offsetSet(64, $data);
		}

		public function set65($data) {
			$this->offsetSet(65, $data);
		}

		public function set66($data) {
			$this->offsetSet(66, $data);
		}

		public function set67($data) {
			$this->offsetSet(67, $data);
		}

		public function set68($data) {
			$this->offsetSet(68, $data);
		}

		public function set69($data) {
			$this->offsetSet(69, $data);
		}

		public function set70($data) {
			$this->offsetSet(70, $data);
		}

		public function set71($data) {
			$this->offsetSet(71, $data);
		}

		public function set72($data) {
			$this->offsetSet(72, $data);
		}

		public function set73($data) {
			$this->offsetSet(73, $data);
		}

		public function set74($data) {
			$this->offsetSet(74, $data);
		}

		public function set75($data) {
			$this->offsetSet(75, $data);
		}

		public function set76($data) {
			$this->offsetSet(76, $data);
		}

		public function set77($data) {
			$this->offsetSet(77, $data);
		}

		public function set78($data) {
			$this->offsetSet(78, $data);
		}

		public function set79($data) {
			$this->offsetSet(79, $data);
		}

		public function set80($data) {
			$this->offsetSet(80, $data);
		}

		public function set81($data) {
			$this->offsetSet(81, $data);
		}

		public function set82($data) {
			$this->offsetSet(82, $data);
		}

		public function set83($data) {
			$this->offsetSet(83, $data);
		}

		public function set84($data) {
			$this->offsetSet(84, $data);
		}

		public function set85($data) {
			$this->offsetSet(85, $data);
		}

		public function set86($data) {
			$this->offsetSet(86, $data);
		}

		public function set87($data) {
			$this->offsetSet(87, $data);
		}

		public function set88($data) {
			$this->offsetSet(88, $data);
		}

		public function set89($data) {
			$this->offsetSet(89, $data);
		}

		public function set90($data) {
			$this->offsetSet(90, $data);
		}

		public function set91($data) {
			$this->offsetSet(91, $data);
		}

		public function set92($data) {
			$this->offsetSet(92, $data);
		}

		public function set93($data) {
			$this->offsetSet(93, $data);
		}

		public function set94($data) {
			$this->offsetSet(94, $data);
		}

		public function set95($data) {
			$this->offsetSet(95, $data);
		}

		public function set96($data) {
			$this->offsetSet(96, $data);
		}

		public function set97($data) {
			$this->offsetSet(97, $data);
		}

		public function set98($data) {
			$this->offsetSet(98, $data);
		}

		public function set99($data) {
			$this->offsetSet(99, $data);
		}

		public function set100($data) {
			$this->offsetSet(100, $data);
		}

		public function set101($data) {
			$this->offsetSet(101, $data);
		}

		public function set102($data) {
			$this->offsetSet(102, $data);
		}

		public function set103($data) {
			$this->offsetSet(103, $data);
		}

		public function set104($data) {
			$this->offsetSet(104, $data);
		}

		public function set105($data) {
			$this->offsetSet(105, $data);
		}

		public function set106($data) {
			$this->offsetSet(106, $data);
		}

		public function set107($data) {
			$this->offsetSet(107, $data);
		}

		public function set108($data) {
			$this->offsetSet(108, $data);
		}

		public function set109($data) {
			$this->offsetSet(109, $data);
		}

		public function set110($data) {
			$this->offsetSet(110, $data);
		}

		public function set111($data) {
			$this->offsetSet(111, $data);
		}

		public function set112($data) {
			$this->offsetSet(112, $data);
		}

		public function set113($data) {
			$this->offsetSet(113, $data);
		}

		public function set114($data) {
			$this->offsetSet(114, $data);
		}

		public function set115($data) {
			$this->offsetSet(115, $data);
		}

		public function set116($data) {
			$this->offsetSet(116, $data);
		}

		public function set117($data) {
			$this->offsetSet(117, $data);
		}

		public function set118($data) {
			$this->offsetSet(118, $data);
		}

		public function set119($data) {
			$this->offsetSet(119, $data);
		}

		public function set120($data) {
			$this->offsetSet(120, $data);
		}

		public function set121($data) {
			$this->offsetSet(121, $data);
		}

		public function set122($data) {
			$this->offsetSet(122, $data);
		}

		public function set123($data) {
			$this->offsetSet(123, $data);
		}

		public function set124($data) {
			$this->offsetSet(124, $data);
		}

		public function set125($data) {
			$this->offsetSet(125, $data);
		}

		public function set126($data) {
			$this->offsetSet(126, $data);
		}

		public function set127($data) {
			$this->offsetSet(127, $data);
		}

		public function set128($data) {
			$this->offsetSet(128, $data);
		}

		public function set129($data) {
			$this->offsetSet(129, $data);
		}

		public function set130($data) {
			$this->offsetSet(130, $data);
		}

		public function set131($data) {
			$this->offsetSet(131, $data);
		}

		public function set132($data) {
			$this->offsetSet(132, $data);
		}

		public function set133($data) {
			$this->offsetSet(133, $data);
		}

		public function set134($data) {
			$this->offsetSet(134, $data);
		}

		public function set135($data) {
			$this->offsetSet(135, $data);
		}

		public function set136($data) {
			$this->offsetSet(136, $data);
		}

		public function set137($data) {
			$this->offsetSet(137, $data);
		}

		public function set138($data) {
			$this->offsetSet(138, $data);
		}

		public function set139($data) {
			$this->offsetSet(139, $data);
		}

		public function set140($data) {
			$this->offsetSet(140, $data);
		}

		public function set141($data) {
			$this->offsetSet(141, $data);
		}

		public function set142($data) {
			$this->offsetSet(142, $data);
		}

		public function set143($data) {
			$this->offsetSet(143, $data);
		}

		public function set144($data) {
			$this->offsetSet(144, $data);
		}

		public function set145($data) {
			$this->offsetSet(145, $data);
		}

		public function set146($data) {
			$this->offsetSet(146, $data);
		}

		public function set147($data) {
			$this->offsetSet(147, $data);
		}

		public function set148($data) {
			$this->offsetSet(148, $data);
		}

		public function set149($data) {
			$this->offsetSet(149, $data);
		}

		public function set150($data) {
			$this->offsetSet(150, $data);
		}

		public function set151($data) {
			$this->offsetSet(151, $data);
		}

		public function set152($data) {
			$this->offsetSet(152, $data);
		}

		public function set153($data) {
			$this->offsetSet(153, $data);
		}

		public function set154($data) {
			$this->offsetSet(154, $data);
		}

		public function set155($data) {
			$this->offsetSet(155, $data);
		}

		public function set156($data) {
			$this->offsetSet(156, $data);
		}

		public function set157($data) {
			$this->offsetSet(157, $data);
		}

		public function set158($data) {
			$this->offsetSet(158, $data);
		}

		public function set159($data) {
			$this->offsetSet(159, $data);
		}

		public function set160($data) {
			$this->offsetSet(160, $data);
		}

		public function set161($data) {
			$this->offsetSet(161, $data);
		}

		public function set162($data) {
			$this->offsetSet(162, $data);
		}

		public function set163($data) {
			$this->offsetSet(163, $data);
		}

		public function set164($data) {
			$this->offsetSet(164, $data);
		}

		public function set165($data) {
			$this->offsetSet(165, $data);
		}

		public function set166($data) {
			$this->offsetSet(166, $data);
		}

		public function set167($data) {
			$this->offsetSet(167, $data);
		}

		public function set168($data) {
			$this->offsetSet(168, $data);
		}

		public function set169($data) {
			$this->offsetSet(169, $data);
		}

		public function set170($data) {
			$this->offsetSet(170, $data);
		}

		public function set171($data) {
			$this->offsetSet(171, $data);
		}

		public function set172($data) {
			$this->offsetSet(172, $data);
		}

		public function set173($data) {
			$this->offsetSet(173, $data);
		}

		public function set174($data) {
			$this->offsetSet(174, $data);
		}

		public function set175($data) {
			$this->offsetSet(175, $data);
		}

		public function set176($data) {
			$this->offsetSet(176, $data);
		}

		public function set177($data) {
			$this->offsetSet(177, $data);
		}

		public function set178($data) {
			$this->offsetSet(178, $data);
		}

		public function set179($data) {
			$this->offsetSet(179, $data);
		}

		public function set180($data) {
			$this->offsetSet(180, $data);
		}

		public function set181($data) {
			$this->offsetSet(181, $data);
		}

		public function set182($data) {
			$this->offsetSet(182, $data);
		}

		public function set183($data) {
			$this->offsetSet(183, $data);
		}

		public function set184($data) {
			$this->offsetSet(184, $data);
		}

		public function set185($data) {
			$this->offsetSet(185, $data);
		}

		public function set186($data) {
			$this->offsetSet(186, $data);
		}

		public function set187($data) {
			$this->offsetSet(187, $data);
		}

		public function set188($data) {
			$this->offsetSet(188, $data);
		}

		public function set189($data) {
			$this->offsetSet(189, $data);
		}

		public function set190($data) {
			$this->offsetSet(190, $data);
		}

		public function set191($data) {
			$this->offsetSet(191, $data);
		}

		public function set192($data) {
			$this->offsetSet(192, $data);
		}

		public function set193($data) {
			$this->offsetSet(193, $data);
		}

		public function set194($data) {
			$this->offsetSet(194, $data);
		}

		public function set195($data) {
			$this->offsetSet(195, $data);
		}

		public function set196($data) {
			$this->offsetSet(196, $data);
		}

		public function set197($data) {
			$this->offsetSet(197, $data);
		}

		public function set198($data) {
			$this->offsetSet(198, $data);
		}

		public function set199($data) {
			$this->offsetSet(199, $data);
		}

		public function set200($data) {
			$this->offsetSet(200, $data);
		}
	}
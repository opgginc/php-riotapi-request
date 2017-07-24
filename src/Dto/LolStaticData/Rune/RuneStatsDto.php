<?php
	/**
	 * Created by PhpStorm.
	 * User: kargnas
	 * Date: 2017-07-04
	 * Time: 18:18
	 */

	namespace RiotQuest\Dto\LolStaticData\Rune;

	use RiotQuest\Dto\BaseDto;

	/**
	 * v1.2 에서는 `rPercentCooldownMod` 식으로 표현 됐던게 r 이 빠짐.
	 * rFlatArmorModPerLevel => FlatArmorModPerLevel
	 * rFlatArmorPenetrationMod => FlatArmorPenetrationMod
	 * rFlatArmorPenetrationModPerLevel => FlatArmorPenetrationModPerLevel
	 * rFlatCritChanceModPerLevel => FlatCritChanceModPerLevel
	 * rFlatCritDamageModPerLevel => FlatCritDamageModPerLevel
	 * rFlatDodgeMod => FlatDodgeMod
	 * rFlatDodgeModPerLevel => FlatDodgeModPerLevel
	 * rFlatEnergyModPerLevel => FlatEnergyModPerLevel
	 * rFlatEnergyRegenModPerLevel => FlatEnergyRegenModPerLevel
	 * rFlatGoldPer10Mod => FlatGoldPer10Mod
	 * rFlatHPModPerLevel => FlatHPModPerLevel
	 * rFlatHPRegenModPerLevel => FlatHPRegenModPerLevel
	 * rFlatMagicDamageModPerLevel => FlatMagicDamageModPerLevel
	 * rFlatMagicPenetrationMod => FlatMagicPenetrationMod
	 * rFlatMagicPenetrationModPerLevel => FlatMagicPenetrationModPerLevel
	 * rFlatMovementSpeedModPerLevel => FlatMovementSpeedModPerLevel
	 * rFlatMPModPerLevel => FlatMPModPerLevel
	 * rFlatMPRegenModPerLevel => FlatMPRegenModPerLevel
	 * rFlatPhysicalDamageModPerLevel => FlatPhysicalDamageModPerLevel
	 * rFlatSpellBlockModPerLevel => FlatSpellBlockModPerLevel
	 * rFlatTimeDeadMod => FlatTimeDeadMod
	 * rFlatTimeDeadModPerLevel => FlatTimeDeadModPerLevel
	 * rPercentArmorPenetrationMod => PercentArmorPenetrationMod
	 * rPercentArmorPenetrationModPerLevel => PercentArmorPenetrationModPerLevel
	 * rPercentAttackSpeedModPerLevel => PercentAttackSpeedModPerLevel
	 * rPercentCooldownMod => PercentCooldownMod
	 * rPercentCooldownModPerLevel => PercentCooldownModPerLevel
	 * rPercentMagicPenetrationMod => PercentMagicPenetrationMod
	 * rPercentMagicPenetrationModPerLevel => PercentMagicPenetrationModPerLevel
	 * rPercentMovementSpeedModPerLevel => PercentMovementSpeedModPerLevel
	 * rPercentTimeDeadMod => PercentTimeDeadMod
	 * rPercentTimeDeadModPerLevel => PercentTimeDeadModPerLevel
	 *
	 * Class RuneStatsDto
	 * @package RiotQuest\Dto\LolStaticData\Rune
	 */
	class RuneStatsDto extends BaseDto
	{
		/** @var double */
		public $PercentTimeDeadModPerLevel;
		/** @var double */
		public $PercentArmorPenetrationModPerLevel;
		/** @var double */
		public $PercentCritDamageMod;
		/** @var double */
		public $PercentSpellBlockMod;
		/** @var double */
		public $PercentHPRegenMod;
		/** @var double */
		public $PercentMovementSpeedMod;
		/** @var double */
		public $FlatSpellBlockMod;
		/** @var double */
		public $FlatEnergyRegenModPerLevel;
		/** @var double */
		public $FlatEnergyPoolMod;
		/** @var double */
		public $FlatMagicPenetrationModPerLevel;
		/** @var double */
		public $PercentLifeStealMod;
		/** @var double */
		public $FlatMPPoolMod;
		/** @var double */
		public $PercentCooldownMod;
		/** @var double */
		public $PercentMagicPenetrationMod;
		/** @var double */
		public $FlatArmorPenetrationModPerLevel;
		/** @var double */
		public $FlatMovementSpeedMod;
		/** @var double */
		public $FlatTimeDeadModPerLevel;
		/** @var double */
		public $FlatArmorModPerLevel;
		/** @var double */
		public $PercentAttackSpeedMod;
		/** @var double */
		public $FlatDodgeModPerLevel;
		/** @var double */
		public $PercentMagicDamageMod;
		/** @var double */
		public $PercentBlockMod;
		/** @var double */
		public $FlatDodgeMod;
		/** @var double */
		public $FlatEnergyRegenMod;
		/** @var double */
		public $FlatHPModPerLevel;
		/** @var double */
		public $PercentAttackSpeedModPerLevel;
		/** @var double */
		public $PercentSpellVampMod;
		/** @var double */
		public $FlatMPRegenMod;
		/** @var double */
		public $PercentHPPoolMod;
		/** @var double */
		public $PercentDodgeMod;
		/** @var double */
		public $FlatAttackSpeedMod;
		/** @var double */
		public $FlatArmorMod;
		/** @var double */
		public $FlatMagicDamageModPerLevel;
		/** @var double */
		public $FlatHPRegenMod;
		/** @var double */
		public $PercentPhysicalDamageMod;
		/** @var double */
		public $FlatCritChanceModPerLevel;
		/** @var double */
		public $FlatSpellBlockModPerLevel;
		/** @var double */
		public $PercentTimeDeadMod;
		/** @var double */
		public $FlatBlockMod;
		/** @var double */
		public $PercentMPPoolMod;
		/** @var double */
		public $FlatMagicDamageMod;
		/** @var double */
		public $PercentMPRegenMod;
		/** @var double */
		public $PercentMovementSpeedModPerLevel;
		/** @var double */
		public $PercentCooldownModPerLevel;
		/** @var double */
		public $FlatMPModPerLevel;
		/** @var double */
		public $FlatEnergyModPerLevel;
		/** @var double */
		public $FlatPhysicalDamageMod;
		/** @var double */
		public $FlatHPRegenModPerLevel;
		/** @var double */
		public $FlatCritDamageMod;
		/** @var double */
		public $PercentArmorMod;
		/** @var double */
		public $FlatMagicPenetrationMod;
		/** @var double */
		public $PercentCritChanceMod;
		/** @var double */
		public $FlatPhysicalDamageModPerLevel;
		/** @var double */
		public $PercentArmorPenetrationMod;
		/** @var double */
		public $PercentEXPBonus;
		/** @var double */
		public $FlatMPRegenModPerLevel;
		/** @var double */
		public $PercentMagicPenetrationModPerLevel;
		/** @var double */
		public $FlatTimeDeadMod;
		/** @var double */
		public $FlatMovementSpeedModPerLevel;
		/** @var double */
		public $FlatGoldPer10Mod;
		/** @var double */
		public $FlatArmorPenetrationMod;
		/** @var double */
		public $FlatCritDamageModPerLevel;
		/** @var double */
		public $FlatHPPoolMod;
		/** @var double */
		public $FlatCritChanceMod;
		/** @var double */
		public $FlatEXPBonus;
	}
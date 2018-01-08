/**
 * Created by Christian on 25/10/2017.
 */

/**
 *
 * @param {number} number
 * @returns {string}
 */
function CurrencyFormat(number) {
	return parseFloat(Math.round(number * 100)/100).toFixed(2);
}
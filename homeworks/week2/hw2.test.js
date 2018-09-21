var alphaSwap = require('./hw2')

describe("hw2", function () {
  it("should return correct answer when str = nick", function () {
    expect(alphaSwap('nick')).toBe('NICK')
  })
  it("should return correct answer when str = ''", function () {
    expect(alphaSwap('')).toBe('')
  })
  it("should return correct answer when str = !!!", function () {
    expect(alphaSwap('!!!')).toBe('!!!')
  })
  it("should return correct answer when str = aBc123!", function () {
    expect(alphaSwap('aBc123!')).toBe('AbC123!')
  })
})